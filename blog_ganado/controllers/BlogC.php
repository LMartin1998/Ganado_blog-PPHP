<?php 

class BlogC extends Controllers {
    public function __construct(){
		parent::__construct();
	}

	public function BlogC ($params){
		$this->views->getView($this,'blogs');
	}

	public function getPost (){
		$data = $this->model->Post();
		echo $data;
	}
	public function test($conn){
		$conn = $this->model->Post();
		$this->views->getView($this, 'test', $conn);
	}
   
}


?>