<?php include("db.php");

class data extends db
{

    private $bookpic;
    private $bookname;
    private $bookdetail;
    private $bookaudor;
    private $bookpub;
    private $branch;
    private $bookprice;
    private $bookquantity;
    private $type;

    private $book;
    private $userselect;
    private $days;
    private $getdate;
    private $returnDate;





    function __construct()
    {
        // echo " constructor ";
        echo "</br></br>";
    }

    function send_book_req($sname,$book_name, $status){

        $this->$sname=$sname;
        $this->$book_name=$book_name;
        $this->$status=$status;
        $query = "INSERT INTO book_issue_requests (sname, book_name, status) VALUES ('$sname','$book_name','$status')";
        
        if ($this->connection->exec($query)) {
            echo '<script type="text/javascript">';
            echo ' alert("done")';  //not showing an alert box.
            echo '</script>';
        } else {
            echo '<script type="text/javascript">';
            echo ' alert("fail")';  //not showing an alert box.
            echo '</script>';
        }
    }

    function userLogin($t1, $t2)
    {

        $q = "SELECT * FROM user where email='$t1' and pass='$t2'";
        $recordSet = $this->connection->query($q);
        $result = $recordSet->rowCount();

        if ($result > 0) {

            foreach ($recordSet->fetchAll() as $row) {
                session_start();
                $logid = $row['id'];
                $name = $row['name'];
                header("location: login_user_serverpage.php?name=$name");
            }
        } else {
            echo '<script type="text/javascript">';
            echo ' alert("Wrong ID or PassWord")';  //not showing an alert box.
            echo '</script>';
            // header("location: index.php?msg=Invalid Credentials");

        }
    }

    function adminLogin($t1, $t2)
    {

        $q = "SELECT * FROM admin where email='$t1' and pass='$t2'";
        $recordSet = $this->connection->query($q);
        $result = $recordSet->rowCount();

        if ($result > 0) {

            foreach ($recordSet->fetchAll() as $row) {
                $logid = $row['id'];
                header("location: loginadmin_server_page.php?logid=$logid");
            }
        } else {
            echo '<script type="text/javascript">';
            echo ' alert("Wrong ID or PassWord")';  //not showing an alert box.
            echo '</script>';
            // header("location: index.php?msg=Invalid Credentials");

        }
    }

    function add_user($name, $email, $mob, $pass)
    {
        $this->$name = $name;
        $this->$email = $email;
        $this->$mob = $mob;
        $this->$pass = $pass;


        $q = "INSERT INTO user (id, name ,email,mob,pass) VALUES ('','$name', '$email', '$mob', '$pass')";

        if ($this->connection->exec($q)) {
            header("Location:adduser.php?msg=done");
        } else {
            echo "fail";
        }
    }

    function add_author($author_name)
    {

        $this->$author_name = $author_name;

        $query = "INSERT INTO  author (id, author_name) VALUES ('','$author_name')";
        // $query_run = mysqli_query($connection,$query);

        if ($this->connection->exec($query)) {
            echo "done";
        } else {
            echo "FAil";
        }
    }


    function addbook($book_name, $book_author, $book_category, $book_no, $book_price)
    {
        $this->$book_name = $book_name;
        $this->$book_author = $book_author;
        $this->$book_category = $book_category;
        $this->$book_no = $book_no;
        $this->$book_price = $book_price;


        // $query = "insert into books values(null,'$_POST[book_name]','$_POST[book_author]','$_POST[book_category]',$_POST[book_no],$_POST[book_price])";

        $q = "INSERT INTO book (id,book_name,author_name,cat_id,book_no,book_price)VALUES('','$book_name', '$book_author', '$book_category', '$book_no', '$book_price')";

        if ($this->connection->exec($q)) {
            header("Location:addbook.php?msg=done");
        } else {
            header("Location:admin_service_dashboard.php?msg=fail");
        }
    }

    function update_book($id, $book_name, $book_author, $book_category, $book_no, $book_price)
    {
        $this->$id = $id;
        $this->$book_name = $book_name;
        $this->$book_author = $book_author;
        $this->$book_category = $book_category;
        $this->$book_no = $book_no;
        $this->$book_price = $book_price;


        echo $id;
        echo $book_name;
        echo $book_author;
        echo $book_category;
        echo $book_no;
        echo $book_price;




        $q = "UPDATE book SET book_name='$book_name',author_name='$book_author',cat_id='$book_category',book_no='$book_no',book_price='$book_price' where id='$id'";

        if ($this->connection->exec($q)) {
            header("Location:loginadmin_server_page.php?msg=done");
            echo "DONE";
        } else {
            // header("Location:admin_service_dashboard.php?msg=fail");

            echo "FAIL..!";
        }
    }

    function delete_book($book_no){
        $this->$book_no=$book_no;

        $q = "DELETE FROM book where book_no = $book_no";

        if ($this->connection->exec($q)) {
            echo '<script type="text/javascript">';
            echo ' alert("done")';  //not showing an alert box.
            echo '</script>';
        } else {
            echo '<script type="text/javascript">';
            echo ' alert("fail")';  //not showing an alert box.
            echo '</script>';
        }
    }

    function ibook($book_name, $book_author, $sname)
    {

        $this->$book_name = $book_name;
        $this->$book_author = $book_author;
        $this->$sname = $sname;


        $query = "INSERT INTO  ibook (id,book_name,author,studentName) VALUES ('','$book_name','$book_author','$sname')";
        // $query_run = mysqli_query($connection,$query);

        if ($this->connection->exec($query)) {
            echo "done";
        } else {
            echo "FAil";
        }
    }

    


    function cat($cat)
    {

        $this->$cat = $cat;



        $query = "INSERT INTO  cat (id,cat) VALUES ('','$cat')";
        // $query_run = mysqli_query($connection,$query);

        if ($this->connection->exec($query)) {
            echo "done";
        } else {
            echo "FAil";
        }
    }
}
