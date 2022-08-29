<?

class getPost {
    public function Post(){
        $query = "SELECT * FROM Post ORDER BY id DESC";
        $run   = mysqli_query($conn, $query);
        $data  = array();

        while($d = mysqli_fetch_assoc($run)){
            $data[] = [$d];
        }

        return $data;
    }
}




?>