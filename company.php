<?php
session_start();
$database = new SQLite3('generalDatabase.sqlite');
$nowID = $_SESSION['userId'];

$userRows = $database->query("SELECT id FROM userCompany WHERE userId = '$nowID';");

$idArr = [];
while ($row = $userRows->fetchArray()) {
    $idArr[] = $row['id'];
}

function removeCompany($database, $id)
{
    $database->query("DELETE FROM userCompany WHERE id = $id");
}

class Company
{
    private int $id;
    private string $name;
    private string $address;
    private string $serviceOfActivity;
    private int $numberOfEmployees;
    private string $description;


    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function setAddress(string $address): void
    {
        $this->address = $address;
    }

    public function getServiceOfActivity(): string
    {
        return $this->serviceOfActivity;
    }

    public function setServiceOfActivity(string $serviceOfActivity): void
    {
        $this->serviceOfActivity = $serviceOfActivity;
    }

    public function getNumberOfEmployees(): int
    {
        return $this->numberOfEmployees;
    }

    public function setNumberOfEmployees(int $numberOfEmployees): void
    {
        $this->numberOfEmployees = $numberOfEmployees;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }


    public function setAll(int $id, string $name, string $address, string $serviceOfActivity, int $numberOfEmployees, string $description)
    {
        $this->id = $id;
        $this->name = $name;
        $this->address = $address;
        $this->serviceOfActivity = $serviceOfActivity;
        $this->numberOfEmployees = $numberOfEmployees;
        $this->description = $description;
    }
}

$companies[] = [];
for ($i = 0; $i < count($idArr); $i++) {
    $obj = new Company();
    $userRow = $database->query("SELECT * FROM userCompany WHERE id = '$idArr[$i]';");
    while ($row = $userRow->fetchArray()) {
        $obj->setAll($row['id'], $row['name'], $row['address'], $row['serviceOfActivity'], $row['numberOfEmployees'], $row['description']);
        $companies[$i] = $obj;
    }
}
if ($userRows->fetchArray()) {
    for ($i = 0; $i < count($companies); $i++) {
        $id = $companies[$i]->getId();
        $name = $companies[$i]->getName();
        $address = $companies[$i]->getAddress();
        $serviceOfActivity = $companies[$i]->getServiceOfActivity();
        $numberOfEmployees = $companies[$i]->getNumberOfEmployees();
        $description = $companies[$i]->getDescription();
        echo "
    <div class='container display-none' id='company$id'>
    <div class='containerHeaderProfile'>
        <span>Details of company</span>
    </div>
    <div class='containerContent'>
        <form action='changeCompany.php' method='post' id='changeCompany$id'>
        <input type='number' name='id' class='display-none' value='$id'>
            <label>
                <p>Name*</p>
                <input type='text' value='$name' name='name' placeholder='Enter name' readonly required>
            </label>
            <label>
                <p>Address*</p>
                <input type='text' value='$address' name='address' readonly placeholder='Enter address' required>
            </label>
            <label>
                <p>Service of activity*</p>
                <input type='text' value='$serviceOfActivity' name='serviceOfActivity' readonly placeholder='Enter service of activity' required>
            </label>
            <label>
                <p>Number of employees*</p>
                <input type='number' value='$numberOfEmployees' name='numberOfEmployees' readonly placeholder='Enter Number of employees' required>
            </label>
            <label>
                <p>Description*</p>
                <textarea style='resize: none' name='description' readonly placeholder='Description'
                          required>$description</textarea>
            </label>
            <button class='display-none' name='submit' >Save</button>
        </form>
        <button id='editCompany$id' class='generalButton' onclick='changeCompany()'>Edit</button>
        <br>
        
         <form action='deleteCompany.php' method='post'>
         <input type='number' name='id' value='$id' class='display-none'>
         <button type='submit' class='generalButton'>Delete</button>
         </form>
         
</script>
        <br>
        <a href='./index.php'>
            <button class='generalButton' onclick='exiting(company);'>Exit</button>
        </a>
    </div>
    <div class='containerFooter'></div>
</div>
    ";
    }
}


