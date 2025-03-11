<?php
require_once __DIR__ . '/../models/Customer.php';

class CustomerController {
    private $customerModel;

    public function __construct() {
        $this->customerModel = new Customer();
    }

    public function index() {
        $customers = $this->customerModel->getAllCustomers();
       return $customers;
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->customerModel->createCustomer($_POST['name'], $_POST['email'], $_POST['phone']);
            header("Location: ../views/customers/index.php");
        } else {
            include __DIR__ . '/../views/customers/create.php';
        }
    }

    public function update($id) {
        $user = $this->customerModel->getCustomerById($id);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->customerModel->updateCustomer($id, $_POST['name'], $_POST['email'], $_POST['phone']);
            header("Location: ../views/customers/index.php");
        } else {
            include __DIR__ . '/../views/customers/update.php';
        }
    }

    public function delete() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $this->customerModel->deleteCustomer($id);
            header("Location: ../views/customers/index.php");
            exit();
        } else {
            echo "Invalid ID.";
            exit();
        }
    }
}

if (isset($_GET['action']) && $_GET['action'] == 'create'){
    $controller = new CustomerController();
    $controller->create();
}
