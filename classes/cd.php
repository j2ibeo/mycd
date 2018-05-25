<?php
namespace MusicCd\Classes;


use MusicCd\Config\Database;
 

include ("/config/database.php");
 

/**
* CD Class
*/
class CD  
{
	
	private $table_name = 'music_cd';

	// properties
	public $id;
	public $artist_name;
	public $album_title;
	public $album_catalog_no;
	public $release_year;
	public $genre;
	public $composer;
	public $owner;
	public $conn;

	public function __construct()
	{
		 
		$db = new Database();
		$this->conn = $db->getConnection();
		 
	}

	//get all cds or single
	public function get($id = null)
	{
		if ($id !== null) {
			$sql = "SELECT * FROM {$this->table_name} WHERE id = :id" ;	
		} else {
			$sql = "SELECT * FROM {$this->table_name}" ;	
		}
		

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id", $id, \PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        
       

	}

	// create new cd
	public function create($data)
	{
		 
		// sql to insert record
	    $sql = "INSERT INTO {$this->table_name}
	            SET
	                artist_name=:artist_name, 
	                album_title=:album_title,
	                album_catalog_no=:album_catalog_no,
	                release_year=:release_year,
	                genre=:genre,
	                composer=:composer,
	                owner=:owner";
	 
	    // prepare query
	    $stmt = $this->conn->prepare($sql);
	 
	    // sanitize
	    
	    $data['release_year'] = (int)$data['release_year'] < 1900 ? 1900 : (int)$data['release_year'];
	    $this->artist_name=htmlspecialchars(strip_tags($data['artist_name']));
	    $this->album_title=htmlspecialchars(strip_tags($data['album_title']));
	    $this->album_catalog_no=htmlspecialchars(strip_tags($data['album_catalog_no']));
	    $this->release_year=htmlspecialchars(strip_tags($data['release_year'])) ;
	    $this->genre=htmlspecialchars(strip_tags($data['genre']));
	    $this->composer=htmlspecialchars(strip_tags($data['composer']));
	    $this->owner=htmlspecialchars(strip_tags($data['owner']));
	 
	    // bind values
	    $stmt->bindParam(":artist_name", $this->artist_name);
	    $stmt->bindParam(":album_title", $this->album_title);
	    $stmt->bindParam(":album_catalog_no", $this->album_catalog_no);
	    $stmt->bindParam(":release_year", $this->release_year);
	    $stmt->bindParam(":genre", $this->genre);
	    $stmt->bindParam(":composer", $this->composer);
	    $stmt->bindParam(":owner", $this->owner);
	 
	    // execute query
	    if($stmt->execute()){
	        return $this->conn->lastInsertId();
	    }
	 
	    return false;
	}


	// get 1 cd
	public function read($id)
	{
		$sql = "SELECT * FROM " . $this->table_name ;

        $stmt = $this->conn->prepare($sql);

        $stmt->execute();
        
        return $stmt;
	}

	public function update($data)
	{
		$sql = "UPDATE {$this->table_name}
	            SET
	                artist_name=:artist_name, 
	                album_title=:album_title,
	                album_catalog_no=:album_catalog_no,
	                release_year=:release_year,
	                genre=:genre,
	                composer=:composer,
	                owner=:owner
	            WHERE id=:id";
	 
	    // prepare query
	    $stmt = $this->conn->prepare($sql);
	 
	    // sanitize
	    
	    $data['release_year'] = (int)$data['release_year'] < 1900 ? 1900 : (int)$data['release_year'];
	    $this->artist_name=htmlspecialchars(strip_tags($data['artist_name']));
	    $this->album_title=htmlspecialchars(strip_tags($data['album_title']));
	    $this->album_catalog_no=htmlspecialchars(strip_tags($data['album_catalog_no']));
	    $this->release_year=htmlspecialchars(strip_tags($data['release_year'])) ;
	    $this->genre=htmlspecialchars(strip_tags($data['genre']));
	    $this->composer=htmlspecialchars(strip_tags($data['composer']));
	    $this->owner=htmlspecialchars(strip_tags($data['owner']));
	    $this->id=intval($data['id']);
	 
	    // bind values
	    $stmt->bindParam(":artist_name", $this->artist_name);
	    $stmt->bindParam(":album_title", $this->album_title);
	    $stmt->bindParam(":album_catalog_no", $this->album_catalog_no);
	    $stmt->bindParam(":release_year", $this->release_year);
	    $stmt->bindParam(":genre", $this->genre);
	    $stmt->bindParam(":composer", $this->composer);
	    $stmt->bindParam(":owner", $this->owner);
	    $stmt->bindParam(":id", $this->id, \PDO::PARAM_INT);
	 
	    // execute query
	    if($stmt->execute()){
	        return $this->id;
	    }
	 
	    return false;
	}

	public function delete($id)
	{
		$sql = "DELETE  FROM {$this->table_name} WHERE id = :id" ;

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id", $id, \PDO::PARAM_INT);

        $stmt->execute();
        
        return $stmt;
	}


	public function isValid($id)
	{
		
		$sql = "SELECT * FROM {$this->table_name} WHERE id = :id" ;	
		
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id", $id, \PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(\PDO::FETCH_ASSOC);
	}





}

