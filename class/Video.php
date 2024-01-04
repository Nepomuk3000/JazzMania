
<?php
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

class Video
{
    public $title;
	public $link;
	
	
    // déclaration des méthodes
	public function __construct($inTitle, $inLink)
	{
		$this->title = $inTitle;
		$this->link = $inLink;
	}
    
    public static function fromDB( $line ) {
        $inTitle = $line['title'];
        $inLink = $line['link'];

		$instance = new self($inTitle, $inLink);
        return $instance;
    }
	
	public function toDB()
	{
		
		$query = 'INSERT INTO video (title, link) VALUES (';
        $query .= "'" . addslashes($this->title) . "', ";
        $query .= "'" . $this->link . "')";
		//2022-03-30T08:58 
        try {
            $dsn = "mysql:host=localhost;dbname=jazzmani";
            $pdo = new PDO($dsn,"jazzmani","FjyXCXRog");
            $result = $pdo->query($query);
			if ($result == false)
			{
				echo "Error processing query : $query";
			}
        } catch (Exception $e) {
            echo 'Exception received : ', $e->getMessage(), "\n";
        }
	}

	public static function removeFromDB($inVideoID)
	{
		$dsn = "mysql:host=localhost;dbname=jazzmani";
	
		$pdo = new PDO($dsn,"jazzmani","FjyXCXRog");
		$query = "DELETE FROM video WHERE videoID=" . $inVideoID . ";";
		try {
            $result = $pdo->query($query);
			if ($result == false)
			{
				echo "Error processing query : $query";
			}
        } catch (Exception $e) {
            echo 'Exception received : ', $e->getMessage(), "\n";
        }
	}
	
	private function showAside()
	{
		echo "<aside>";
		echo $GLOBALS['citations'][rand(0,sizeof($GLOBALS['citations'])-1)];
		echo "</aside>";
	}

	
	private function showArticle($isLeftSide)
	{
        echo '<article style="border-radius: 10px; background-color: #000;padding-bottom:10px ; box-shadow:2px 2px 2px #333">';
        echo '<iframe height=500px width=100% src="' . $this->link . '" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen onload="player1=new YT.Player(this)"></iframe>';
        echo '</article>';
	}
	
	public function show()
	{
		static $leftSide = true;
        echo '<h1>' . $this->title . "</h1>";
        echo '<div class="articleAsideContener" style="position:relative;margin-bottom:12px">';

		if ($leftSide == true)
		{
			$this->showArticle($leftSide);
			$this->showAside();
			$leftSide = false;
		}
		else
		{
			$this->showAside();
			$this->showArticle($leftSide);
			$leftSide = true;
		}
        echo '</div>';

	}
}
?>