import mysql.connector
import send_to_db


def main(config):
    output = []
    db = mysql.connector.Connect(**config)
    cursor = db.cursor()
    stmts = ["SELECT * FROM top_cities(cities)"]

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
    send-to-db.main(config)