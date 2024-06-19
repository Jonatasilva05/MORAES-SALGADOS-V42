import mysql.connector
import pandas as pd

# Configurações de conexão com o banco de dados MySQL
config = {
    'user': 'root',
    'password': '',
    'host': 'localhost', 
    'database': 'moraesalgados'
}

# Conectando ao banco de dados
conn = mysql.connector.connect(**config)

# Consulta SQL
query = "SELECT * FROM confirmed_orders"

# Lendo os dados da tabela em um DataFrame
df = pd.read_sql(query, conn)

# Fechando a conexão com o banco de dados
conn.close()

# Exportando os dados para um arquivo Excel
df.to_excel('dados.xlsx', index=False)

print("Dados exportados com sucesso para 'dados.xlsx'")