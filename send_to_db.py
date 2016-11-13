import mysql.connector

def main(config):
    output = []
    db = mysql.connector.Connect(**config)
    cursor = db.cursor()
    with open('cities.txt', 'r') as f:
       s = f.read()
       keywords = ast.literal_eval(s)
    $first = str(null)
    $second = str(null)
    $third = str(null)

    info = "abc" * 10000

    stmts = [
        "INSERT INTO top_cities(cities) VALUES ('$first')",
        "SELECT COUNT(*) AS cnt FROM top_cities",
        "INSERT INTO top_cities(cities) VALUES ('$second')",
        "SELECT COUNT(*) AS cnt FROM top_cities",
        "INSERT INTO top_cities(cities) VALUES ('$third')",
        "SELECT COUNT(*) AS cnt FROM top_cities",
    ]

    # Note 'multi=True' when calling cursor.execute()
    for result in cursor.execute(' ; '.join(stmts), multi=True):
        if result.with_rows:
            if result.statement == stmts[0]:
                output.append("Names in table: " +
                              ' '.join([name[0] for name in result]))
            else:
                output.append(
                    "Number of rows: {0}".format(result.fetchone()[0]))
        else:
            output.append("Inserted {0} row{1}".format(
                result.rowcount,
                's' if result.rowcount > 1 else ''))

    cursor.close()
    db.close()
    return output


if __name__ == '__main__':

    config = {
        'host': 'localhost',
        'port': 3306,
        'database': 'udest',
        'user': 'root',
        'password': '',
        'charset': 'utf8',
        'use_unicode': True,
        'get_warnings': True,
    }

    out = main(config)
    print('\n'.join(out))