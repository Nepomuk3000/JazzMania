
<?php
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

class Concert
{
    public $title;
	public $details;
	public $image;
	public $date;
	public $city;
	public $location;
	public $isImportant;
	public $set;
	public $isCanceled;
	
	
    // déclaration des méthodes
	public function __construct($inDate, $inTitle, $inDetails, $inCity="", $inLocation="", $inSet=BIG_BAND, $inIsImportant=true, $inIsCanceled=false, $inImageBlob="")
	{
		$this->title = $inTitle;
		$this->details = $inDetails;
		$this->date = $inDate;		
		$this->city = $inCity;	
		$this->location = $inLocation;
		$this->isImportant = $inIsImportant;
		$this->set = $inSet;
		$this->isCanceled = $inIsCanceled;
		$this->image = $inImageBlob;
	}

	public static function fromArgs($inDate, $inTitle, $inDetails, $inCity="", $inLocation="", $inSet="BIG_BAND", $inIsImportant=true, $inIsCanceled=false, $inImageBlob="")
	{
		setlocale( LC_ALL , "fr_FR");

		$date = DateTimeImmutable::createFromFormat("Y-m-d\TH:i", $inDate);
		if ($date == false)
		{
			echo "ERROR : Bad date format. Expected : Y-m-d\TH:i, get : ".  $inDate . "<br>";
		}
		switch ($inSet) {
			case 'SEPTET':
				$set = 'JAZZTET';
				break;
            default:
                $set = $inSet;
                break;
		}

		$instance = new self($date, $inTitle, $inDetails, $inCity, $inLocation, $set, $inIsImportant, $inIsCanceled, $inImageBlob);
        return $instance;
	}
    
    public static function fromDB( $line ) {
        $inTitle = $line['title'];
        $inDate = DateTimeImmutable::createFromFormat("Y-m-d H:i:s", $line['date']	);
        $inCity = $line['city'];
		$inLocation = $line['location'];
        $inDetails = $line['description'];
        $inImageBlob = $line['image'];
        $inSet = $line['band'];
        $inIsImportant = $line['isImportant'];
        $inIsCanceled = $line['isCanceled'];
        $inImageBlob = $line['image'];

		$instance = new self($inDate, $inTitle, $inDetails, $inCity, $inLocation, $inSet, $inIsImportant, $inIsCanceled, $inImageBlob);
        return $instance;
    }
	
	public function toDB()
	{
		
		$query = 'INSERT INTO date (title, date, city, location, description, image, band) VALUES (';
        $query .= "'" . addslashes($this->title) . "', ";
        $query .= "'" . date( "Y-m-d\TH:i",$this->date->getTimeStamp()) . "', ";
        $query .= "'" . $this->city . "', ";
        $query .= "'" . addslashes($this->location) . "', ";
        $query .= "'" . htmlspecialchars(addslashes($this->details)) . "', ";
        $query .= "'" . htmlspecialchars($this->image) . "', ";
        $query .= "'" . htmlspecialchars($this->set) . "')";
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

	public static function removeFromDB($inDateID)
	{
		$dsn = "mysql:host=localhost;dbname=jazzmani";
	
		$pdo = new PDO($dsn,"jazzmani","FjyXCXRog");
		$query = "DELETE FROM date WHERE dateID=" . $inDateID . ";";
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
		$fileImage="images/dates/" . date( "Y-m-d",$this->date->getTimeStamp()) . ".jpg";
		echo "<aside>";
		if (file_exists($fileImage) == true)
		{
			echo "<p id='photo_zozor'><img src='/$fileImage' alt=\"Photo à venir\" width='200'></p>";
		}
		else
		{
			echo $GLOBALS['citations'][rand(0,sizeof($GLOBALS['citations'])-1)];
		}
		echo "</aside>";
	}

	
	private function showArticle($isLeftSide )
	{
		echo "
		<article height='100%' style='border-radius: 10px; background-color: #000;padding-bottom:10px ; box-shadow: ";
	
		if ($isLeftSide == true) 
		{
			echo "-";
		}	
		echo "2px 2px 2px ";
		if ($this->isImportant == true)
		{
			echo "#833'>";
		}
		else
		{
			echo "#333'>";
		}

		$fmt = new IntlDateFormatter(
			'fr_fr',
			IntlDateFormatter::FULL,
			IntlDateFormatter::FULL,
			'America/Los_Angeles',
			IntlDateFormatter::GREGORIAN,
			'dd MMMM yyyy'
		);

		echo "<h3>";
		echo $fmt->format($this->date->getTimestamp());

		echo " à ";
        echo date('H\hi', $this->date->getTimestamp()) ;

		echo "</h3>";
		echo "<b>" . $this->title . "</b></br></br><i>" . $this->details . "</i>"	;

			

		echo "</article>";
	}
	
	public function show()
	{
		static $leftSide = true;
		static $previousYear = 0;
		
		$currentYear = date("Y",$this->date->getTimeStamp());
		if ($currentYear != $previousYear)
		{
			echo "<h2>$currentYear</h2>";
			$previousYear = $currentYear;
		}
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
								
		if ($this->isCanceled == true)
		{
			echo '
			<div style="position:absolute; top:0; z-index:2;width:100%">
				<img src="https://i1.wp.com/as-surques-escoeuilles.fr/wp-content/uploads/2017/05/annule.png" height="150" alt="ANNULÉ" style="display:block; margin:auto;opacity:70%" />
			</div>';
		}
		echo '</div>';
	}
}
?>