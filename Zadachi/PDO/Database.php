<?php
class Database
{
    private static $dbservername = "localhost";
    private static $dbusername = "root";
    private static $dbpassword = "root";
    private static $dbname = "db_app";
    private static $dbcharset = 'utf8mb4';

    protected static $pdo;

    public function connect()
    {
        if (self::$pdo === null) {
            $dsn = "mysql:host=" . self::$dbservername . ";dbname=" . self::$dbname . ";charset=" . self::$dbcharset;

            $options = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];

            try {
                self::$pdo = new PDO($dsn, self::$dbusername, self::$dbpassword, $options);
            } catch (\PDOException $e) {
                throw new \PDOException($e->getMessage(), (int)$e->getCode());
            }
        }
    }

    protected function executeQuery($query, $params = []) : mixed
    {
        try {
            $stmt = self::$pdo->prepare($query);
            $stmt->execute($params);
            return $stmt;
        } catch (\PDOException $e) {
            throw new \Exception("Database query error: " . $e->getMessage());
        }
    }

    public function getUsers(): array
    {
        return array_map(fn($user) => $user['name'], $this->executeQuery('SELECT * FROM users')->fetchAll());
    }

    public function addUser(string $name, string $email): void
    {
        $this->executeQuery('INSERT INTO users (name, email) VALUES (:name, :email)', [':name' => $name, ':email' => $email]);
    }

    public function deleteUser(int $id) : void
    {
        $this->executeQuery('DELETE FROM users WHERE id=:id', [':id' => $id]);
    }



    public function getUserByEmail(string $email): array //(2)  Защита от SQL-инъекций 
    {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: [];
    }

    public function addUser1(string $name, string $email): void // (2) Защита от SQL-инъекций 
    {
        $stmt = $this->pdo->prepare("INSERT INTO users (name, email) VALUES (:name, :email)");
        $stmt->bindValue(':email', $email);
        $stmt->execute(['name' => $name, 'email' => $email]);
    }

    public function deleteUser1(string $id): void //(2)  Защита от SQL-инъекций 
    {
        $stmt = $this->pdo->prepare("DELETE FROM users WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }
}


$db = new Database();
$db->addUser('DROP TABLE users;', "richard@mail.ru");
print_r($db->getUsers());
$db->deleteUser(2);
print_r($db->getUsers());
$db->deleteUser1("1 OR 1=1"); 
print_r($db->getUsers());
print_r($db->getUserByEmail('bob@mail.ru'));