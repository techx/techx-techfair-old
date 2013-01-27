import json
from collections import defaultdict

d = defaultdict(list)

with open('ldap.json') as f:
    values = json.load(f)
    for item in values:
        athena, domain = item['value'].split('@')
        if domain != 'mit.edu':
            continue
        d[item['value'][0]].append(item['value'])
print "var athenas =",
print json.dumps(d, indent=2)
