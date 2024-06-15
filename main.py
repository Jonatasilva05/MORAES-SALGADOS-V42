import mysql.connector
from openpyxl import Workbook
from openpyxl.styles import Alignment

# Função para conectar ao banco de dados
def connect_to_database():
    return mysql.connector.connect(
        host="localhost",
        user="root",
        password="",
        database="moraesalgados"
    )

# Função para buscar dados da tabela confirmed_orders
def fetch_orders(conn):
    cursor = conn.cursor(dictionary=True)
    cursor.execute("SELECT * FROM confirmed_orders")
    return cursor.fetchall()

# Função para gerar o arquivo Excel
def generate_excel(orders):
    wb = Workbook()
    ws = wb.active
    ws.title = "Pedidos Confirmados"

    # Definindo cabeçalhos
    headers = ['ID', 'Nome do Usuário', 'Email do Usuário', 'Endereço', 'Produto', 'Tipo de Quantidade', 'Quantidade', 'Sabor', 'Data/Hora do Pedido', 'Status']
    ws.append(headers)

    # Inserindo dados
    for order in orders:
        row = [
            order['id'],
            order['user_name'],
            order['user_email'],
            f"{order['endereco']}, {order['numero']}, {order['bairro']}, {order['cidade']}",
            order['product'],
            order['quantity_type'],
            order['quantity'],
            order['flavor'],
            order['order_date'].strftime("%Y-%m-%d %H:%M:%S"),
            order['status']
        ]
        ws.append(row)

    # Ajustando alinhamento
    for col in ws.columns:
        max_length = 0
        column = col[0].column_letter
        for cell in col:
            try:
                if len(str(cell.value)) > max_length:
                    max_length = len(cell.value)
            except:
                pass
        adjusted_width = (max_length + 2) * 1.2
        ws.column_dimensions[column].width = adjusted_width
        ws.column_dimensions[column].alignment = Alignment(wrap_text=True, vertical='top')

    # Salvando o arquivo Excel
    wb.save("pedidos_confirmados.xlsx")
    print("Arquivo Excel gerado com sucesso: pedidos_confirmados.xlsx")

# Função principal
def main():
    try:
        conn = connect_to_database()
        orders = fetch_orders(conn)
        generate_excel(orders)
    except Exception as e:
        print(f"Erro ao gerar o arquivo Excel: {e}")
    finally:
        if 'conn' in locals() and conn.is_connected():
            conn.close()

if __name__ == "__main__":
    main()
