<?php 
class Db 
{
    // Biến lưu trữ kết nối
    private $__conn;
    // Hàm Kết Nối
     function __construct()
    {
        // Nếu chưa kết nối thì thực hiện kết nối
        if (!$this->__conn){
            // Kết nối
            $this->__conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME) or die ('Lỗi kết nối');
            // Để tránh lỗi font 
            $this->__conn->set_charset("utf8");
        }
    }
 
    // Hàm Ngắt Kết Nối
    public function __destruct(){
        // Nếu đang kết nối thì ngắt
        if ($this->__conn){
            mysqli_close($this->__conn);
        }
    }
 
    // Hàm Insert add
    public function insert($table, $a, $className) //data sẽ ở dạng array
    {
        $c = new $className();
        $c -> url = $a;
        // gán giá trị cho các biến title và content
        if ($c->__deleteGarbage() =='') {
            return ERROR;
        } else {
            $title = $c -> takeTitle();
        $content = $c -> takeContent();
        // kiểm tra xem dữ liệu này đã được lưu chưa
        $sql1 = "SELECT Id FROM $table WHERE Title = '$title' ";
        $test = new Db();
        if ($test -> getRow($sql1) == false) {
            $data = array(
                'Title'   => $title,
                'Content' => $content,
            );
            $field_list = '';
            // Lưu trữ danh sách giá trị tương ứng với field
            $value_list = '';
            // Lặp qua data
            foreach ($data as $key => $value){
                $field_list .= ",$key";
                $value_list .= ",'".addslashes($value)."'";
            }
            // Vì sau vòng lặp các biến $field_list và $value_list sẽ thừa một dấu , nên ta sẽ dùng hàm trim để xóa đi
            $sql = 'INSERT INTO '.$table. '('.trim($field_list, ',').') VALUES (N'.trim($value_list, ',').')';
            mysqli_query($this->__conn, $sql);
            $_SESSION['success']= '<span class="flash">Add data Success</span>';
        } else {
            // var_dump($test->getRow($sql1));
            $_SESSION['linkerror']= $_POST['link'];
            $_SESSION['existed']=  '<span>Data existed. Please input new url !</span>';
        }       
        }
    }
 
    // Hàm Update edit
    public function update($table, $data, $where)
    {
        $sql = '';
        // Lặp qua data
        foreach ($data as $key => $value){
            $sql .= "$key = '".addslashes($value)."',";
            //mysql_escape_string($value) để trong trg hợp giá trị có những ký tự đặc biệt thì nó 
            //sẽ thêm \ vào trk ký tự đó để ký tự đó đc nhận vào và ko gây ra lỗi ví dụ như những ký tự " ' sẽ gây hiểu lầm về kết thúc chuỗi nên cần dấu\ ở trk nó
        }
        // Vì sau vòng lặp biến $sql sẽ thừa một dấu , nên ta sẽ dùng hàm trim để xóa đi
        $sql = 'UPDATE '.$table. ' SET '.trim($sql, ',').' WHERE '.$where;
        return mysqli_query($this->__conn, $sql);
    }
 
    // Hàm delete
    public function remove($table, $where){
        $sql = "DELETE FROM $table WHERE $where";
        return mysqli_query($this->__conn, $sql);
    }
 
    // Hàm lấy danh sách
    public function getList($sql)
    {
        $result = mysqli_query($this->__conn, $sql);
        if (!$result){
            die ('Câu truy vấn bị sai');
        }
        $return = array();
        // Lặp qua kết quả để đưa vào mảng
        while ($row = mysqli_fetch_assoc($result)){
            $return[] = $row;
        }
        // Xóa kết quả khỏi bộ nhớ
        mysqli_free_result($result);
        return $return;
    }

    // ham đếm để trong trg hợp xét xem dữ liệu đã tồn tại hay chưa nếu tồn tại >0 chưa thì < 0
    public function numRow($sql){
        $link= new mysqli('localhost', 'root', '', 'ControlData') or die ('Lỗi kết nối');
        $result=mysqli_query($link,$sql);
        $num_row=mysqli_num_rows($result);
        return $num_row;
    }

    // Hàm lấy 1 record dùng trong trường hợp lấy chi tiết tin
    public function getRow($sql)
    {
        $result = mysqli_query($this->__conn, $sql);
        if (!$result){
            return false;
        }
        $row = mysqli_fetch_assoc($result);
        // Xóa kết quả khỏi bộ nhớ
        mysqli_free_result($result);
        if ($row){
            return $row;
        }
    }
}

?>