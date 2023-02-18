import sys
import pandas

# string = ''
# print(sys.argv[1])
# for w in sys.argv[1]:
#     string += w
# print(string)

from neo4j import GraphDatabase

def query3(tx, supplier):
    result = tx.run('''
    MATCH path = (uu:USER)-[h:HAVING]->(rg:RG)-[ct:CONTAIN]->(prg:PRG)-[conn:CONNECT]->(p:PRODUCT)<-[prov:PROVIDE]-(ss:SUPPLIER {sname:"'''+supplier+'''"})
            return count(path) AS CT, uu
            ORDER BY CT DESC
            LIMIT 3
            ''')
    for record in iter(result):
        # print(record)
        CT = record.items()[0][1]
        uu = record.items()[1][1]
        uid = uu.get('uid')
        print(CT)
        print(uid)
def query4(tx, supplier, customer_id):
    result1 = tx.run('''
    MATCH (pp:PRODUCT)<-[:PROVIDE]-(:SUPPLIER {sname:"'''+supplier+'''"})
    WITH pp.pid as pid
    MATCH path = (:USER{uid:"'''+customer_id+'''"})-[:HAVING]->(:RG)-[:CONTAIN]->(:PRG)-[:CONNECT]->(p:PRODUCT {pid:pid})-[:BELONG]->(c:CATEGORY)
    return count(path) as ct, c
    order by ct desc
    LIMIT 1
    ''')
    record = next(result1)
    CT = record.items()[0][1]
    c = record.items()[1][1]
    category = c.get('class')

    result2 = tx.run('''
    MATCH (c:CATEGORY {class:"'''+category+'''"})<-[b:BELONG]-(p:PRODUCT)<-[:PROVIDE]-(:SUPPLIER {sname:"'''+supplier+'''"})
RETURN c,b,p
    ''')
    for record in result2:
        c = record.items()[2][1]
        product = c.get('pname')
        print(product)
    
def query5(tx, supplier):
    result = tx.run('''
    match (:SUPPLIER {sname:"'''+supplier+'''"}) -[:PROVIDE]->(p:PRODUCT)<-[conn:CONNECT]-(:PRG)<-[ct:CONTAIN]-(:RG) 
    return p, count(ct) as degree
    ORDER BY degree DESC
    LIMIT 1
    ''')
    record = next(result)
    p = record.items()[0][1]
    degree = record.items()[1][1]
    product = p.get('pname')
    print(product)
    print(degree)

def query6(tx, supplier):
    result = tx.run('''
    MATCH (s:SUPPLIER {sname:"'''+supplier+'''"})-[:PROVIDE]->(:PRODUCT)-[t:BELONG]-(c:CATEGORY)
    return s.sname AS name, collect(DISTINCT c.class_name) AS sells
    ''')
    record = next(result)
    categories = record.items()[1][1]
    for c in categories:
        print(c)

def query7(tx, userid):
    result = tx.run('''
    MATCH (c:USER {uid:"'''+userid+'''"})-[h:HAVING]->(:RG)-[ct:CONTAIN]->(:PRG)-[:CONNECT]->(:PRODUCT)-[:BELONG]->(cat:CATEGORY)
    return cat.class_name AS purchase, count(ct) AS quantity
    ORDER by quantity
    ''')
    for record in iter(result):
        purchase = record.items()[0][1]
        quantity = record.items()[1][1]
        print(purchase)
        print(quantity)



query_num = sys.argv[1]
driver = GraphDatabase.driver("bolt://localhost:7687", auth=("neo4j", "1234"))
with driver.session() as session:
    if(query_num == '3'):
        supplier = sys.argv[2]
        result = session.execute_read(query3, supplier)
    elif(query_num == '4'):
        supplier = sys.argv[2]
        customer = sys.argv[3]
        result = session.execute_read(query4, supplier, customer)
    elif(query_num == '5'):
        supplier = sys.argv[2]
        result = session.execute_read(query5, supplier)
    elif(query_num == '6'):
        supplier = sys.argv[2]
        result = session.execute_read(query6, supplier)
    elif(query_num == '7'):
        supplier = sys.argv[2]
        result = session.execute_read(query7, supplier)