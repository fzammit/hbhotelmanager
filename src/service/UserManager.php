<?php

namespace App\Service;

use App\Model\User;
use PDO;

class UserManager extends AbstractManager implements ManagerInterface
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        parent::__construct();
        $this->pdo = $pdo;
    }
    /**
     * @param array $array
     * @return User
     */
    public function arrayToObject(array $array)
    {

        $user = new User;
        $user->setId($array['id']);
        $user->setFirstName($array['firstname']);
        $user->setLastName($array['lastname']);
        $user->setEntry_Date($array['entry_date']);
        $user->setDeparture_Date($array['departure_date']);

        return $user;
    }

    /**
     * @return User[]
     */

    public function findAll()
    {
        $query = 'SELECT * FROM client';
        $statement = $this->pdo->prepare($query);
        $statement->execute();

        $data = $statement->fetchAll(PDO::FETCH_ASSOC);

        $users = [];

        foreach ($data as $d) {
            $users[] = $this->arrayToObject($d);
        }
        return $users;
    }

    /**
     * @param int $id
     * @return User
     */
    public function findOneById(int $id)
    {
        $query = 'SELECT * FROM client WHERE id = :id';
        $statement = $this->pdo->prepare($query);
        $statement->execute(['id' => $id]);

        $data = $statement->fetch(PDO::FETCH_ASSOC);

        $user = $this->arrayToObject($data);

        return $user;
    }

    /**
     * @param string $field
     * @param string $value
     * @return User[]
     */
    public function findByField(string $field, string $value)
    {
    }

    /**
     * @param array$data
     */
    public function create(array $data)
    {
        $query = "INSERT INTO client(firstname, lastname, entry_date, departure_date) VALUES (:firstname, :lastname, :entry_date, :departure_date)";

        $statement = $this->pdo->prepare($query);
        $statement->execute([
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'entry_date' => $data['entry_date'],
            'departure_date' => $data['departure_date']
        ]);
    }

    /**
     * @param array $data
     */
    public function update(int $id, array $data)
    {
        $query = "UPDATE client SET firstname = :firstname, lastname = :lastname, entry_date = :entry_date, departure_date = :departure_date WHERE id = :id";

        $statement = $this->pdo->prepare($query);
        $statement->execute ([
            'id' => $id,
            'firstname' => $data[ 'firstname' ],
            'lastname' => $data[ 'lastname'],
            'entry_date' => $data[ 'entry_date' ],
            'departure_date' =>$data[ 'departure_date']

        ]);
    }

    public function delete(int $id) {
        $query = "DELETE FROM client WHERE id = :id";

        $statement = $this->pdo->prepare($query);
        $statement->execute([
            'id' => $id,
        ]);
    }
}
