<?php
namespace App\Model;

use App\Service\Config;

class Pizza
{
    private ?int $id = null;
    private ?string $name = null;
    private ?float $price = null;
    private ?string $description = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(?float $price): self
    {
        $this->price = $price;
        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;
        return $this;
    }

    public static function fromArray(array $array): self
    {
        $pizza = new self();
        $pizza->fill($array);
        return $pizza;
    }

    public function fill(array $array): self
    {
        if (isset($array['id'])) {
            $this->setId((int)$array['id']);
        }
        if (isset($array['name'])) {
            $this->setName($array['name']);
        }
        if (isset($array['price'])) {
            $this->setPrice((float)$array['price']);
        }
        if (isset($array['description'])) {
            $this->setDescription($array['description']);
        }
        return $this;
    }

    public static function findAll(): array
    {
        $pdo = new \PDO(Config::get('db_dsn'), Config::get('db_user'), Config::get('db_pass'));
        $sql = 'SELECT * FROM pizza';
        $statement = $pdo->prepare($sql);
        $statement->execute();

        $pizzas = [];
        $rows = $statement->fetchAll(\PDO::FETCH_ASSOC);
        foreach ($rows as $row) {
            $pizzas[] = self::fromArray($row);
        }

        return $pizzas;
    }

    public static function find(int $id): ?self
    {
        $pdo = new \PDO(Config::get('db_dsn'), Config::get('db_user'), Config::get('db_pass'));
        $sql = 'SELECT * FROM pizza WHERE id = :id';
        $statement = $pdo->prepare($sql);
        $statement->execute(['id' => $id]);

        $row = $statement->fetch(\PDO::FETCH_ASSOC);
        if (! $row) {
            return null;
        }
        return self::fromArray($row);
    }

    public function save(): void
    {
        $pdo = new \PDO(Config::get('db_dsn'), Config::get('db_user'), Config::get('db_pass'));
        if (! $this->getId()) {
            $sql = "INSERT INTO pizza (name, price, description) VALUES (:name, :price, :description)";
            $statement = $pdo->prepare($sql);
            $statement->execute([
                'name' => $this->getName(),
                'price' => $this->getPrice(),
                'description' => $this->getDescription(),
            ]);
            $this->setId((int)$pdo->lastInsertId());
        } else {
            $sql = "UPDATE pizza SET name = :name, price = :price, description = :description WHERE id = :id";
            $statement = $pdo->prepare($sql);
            $statement->execute([
                ':name' => $this->getName(),
                ':price' => $this->getPrice(),
                ':description' => $this->getDescription(),
                ':id' => $this->getId(),
            ]);
        }
    }

    public function delete(): void
    {
        $pdo = new \PDO(Config::get('db_dsn'), Config::get('db_user'), Config::get('db_pass'));
        $sql = "DELETE FROM pizza WHERE id = :id";
        $statement = $pdo->prepare($sql);
        $statement->execute([
            ':id' => $this->getId(),
        ]);

        $this->setId(null);
        $this->setName(null);
        $this->setPrice(null);
    }
}
