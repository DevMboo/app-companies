# CodeIgniter 4 API Companies L5 Network

## README - Português

### 📌 Requisitos
- PHP 8.0 ou superior
- Composer
- Banco de Dados (MySQL, PostgreSQL, etc.)

### 🚀 Configuração do Projeto
1. **Clone o repositório:**
   ```bash
   git clone https://github.com/DevMboo/app-companies
   cd app-companies
   ```
2. **Instale as dependências via Composer:**
   ```bash
   composer install
   ```
3. **Configuração do ambiente:**
   - Copie o arquivo de configuração padrão:
     ```bash
     cp env .env
     ```
   - Edite o arquivo `.env` e configure as credenciais do banco de dados:
     ```ini
     database.default.hostname = localhost
     database.default.database = app_comp_db
     database.default.username = usuario
     database.default.password = senha
     database.default.DBDriver = MySQL # Ou outro driver
     ```
4. **Execute as migrations para criar as tabelas:**
   ```bash
   php spark migrate
   ```
5. **Inicie o servidor:**
   ```bash
   php spark serve
   ```

### 🔐 Autenticação JWT
- Para acessar algumas rotas, é necessário um token JWT.
- Faça login para obter um token:
  ```bash
  POST /api/login
  ```
- Use o token no header `Authorization` para acessar endpoints protegidos:
  ```bash
  Authorization: Bearer SEU_TOKEN
  ```

### 📌 Rotas da API
#### 🧑 Clientes
- `GET /api/clients` → Lista todos os clientes
- `GET /api/clients/show/{id}` → Exibe um cliente específico
- `POST /api/clients/save` → Cria um cliente
- `PUT /api/clients/update/{id}` → Atualiza um cliente
- `DELETE /api/clients/delete/{id}` → Deleta um cliente

#### 📦 Produtos (Requer autenticação JWT)
- `GET /api/products` → Lista todos os produtos
- `GET /api/products/show/{id}` → Exibe um produto específico
- `POST /api/products/save` → Cria um produto
- `PUT /api/products/update/{id}` → Atualiza um produto
- `DELETE /api/products/delete/{id}` → Deleta um produto

#### 📦 Pedidos
- `GET /api/orders` → Lista todos os pedidos
- `GET /api/orders/show/{id}` → Exibe um pedido específico
- `POST /api/orders/save` → Cria um pedido
- `PUT /api/orders/update/{id}` → Atualiza um pedido
- `DELETE /api/orders/delete/{id}` → Deleta um pedido

---

# CodeIgniter 4 API Companies L5 Network

## README - English

### 📌 Requirements
- PHP 8.0 or higher
- Composer
- Database (MySQL, PostgreSQL, etc.)

### 🚀 Project Setup
1. **Clone the repository:**
   ```bash
   git clone https://github.com/DevMboo/app-companies
   cd app-companies
   ```
2. **Install dependencies via Composer:**
   ```bash
   composer install
   ```
3. **Environment configuration:**
   - Copy the default environment file:
     ```bash
     cp env .env
     ```
   - Edit `.env` and configure database credentials:
     ```ini
     database.default.hostname = localhost
     database.default.database = app_comp_db
     database.default.username = user
     database.default.password = password
     database.default.DBDriver = MySQL # Or another driver
     ```
4. **Run migrations to create tables:**
   ```bash
   php spark migrate
   ```
5. **Start the server:**
   ```bash
   php spark serve
   ```

### 🔐 JWT Authentication
- To access some routes, a JWT token is required.
- Login to get a token:
  ```bash
  POST /api/login
  ```
- Use the token in the `Authorization` header to access protected endpoints:
  ```bash
  Authorization: Bearer YOUR_TOKEN
  ```

### 📌 API Routes
#### 🧑 Clients
- `GET /api/clients` → List all clients
- `GET /api/clients/show/{id}` → Show a specific client
- `POST /api/clients/save` → Create a client
- `PUT /api/clients/update/{id}` → Update a client
- `DELETE /api/clients/delete/{id}` → Delete a client

#### 📦 Products (Requires JWT Authentication)
- `GET /api/products` → List all products
- `GET /api/products/show/{id}` → Show a specific product
- `POST /api/products/save` → Create a product
- `PUT /api/products/update/{id}` → Update a product
- `DELETE /api/products/delete/{id}` → Delete a product

#### 📦 Orders
- `GET /api/orders` → List all orders
- `GET /api/orders/show/{id}` → Show a specific order
- `POST /api/orders/save` → Create an order
- `PUT /api/orders/update/{id}` → Update an order
- `DELETE /api/orders/delete/{id}` → Delete an order

