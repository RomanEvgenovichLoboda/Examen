
<?php

class ProductModel
{
    protected $id;
    protected $name;
    protected $price;
    protected $header;
    protected $descriptions;
    protected $imagepath;
    public function __construct($id=0,$name,$price,$header,$descriptions,$imagepath)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->header = $header;
        $this->descriptions = $descriptions;
        $this->imagepath = $imagepath;
    }

    /**
     * @return int|mixed
     */
    public function getId(): mixed
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @return mixed
     */
    public function getHeader()
    {
        return $this->header;
    }

    /**
     * @return mixed
     */
    public function getDescriptions()
    {
        return $this->descriptions;
    }

    /**
     * @return mixed
     */
    public function getImagepath()
    {
        return $this->imagepath;
    }
    public function ShowProduct(){
//       return "<div class='d-inline-block' style='width: 200px'>
           return" <img class='card-img-top' src='../Images/".$this->imagepath."' style='height: 155px '></img>
            <p>Id - ".$this->id."</p>
            <p>Name - ".$this->name."</p>
            <p>Prc(grn) - ".$this->price."</p>
            <p>Hdr - ".$this->header."</p>
            <p>Dscrpt - ".$this->descriptions."</p>
            <p>Path - ".$this->imagepath."</p>";
//            </div>";
    }

    public function Edit(){
//       return "<div class='d-inline-block' style='width: 200px'>
        return" <img class='card-img-top' src='../Images/".$this->imagepath."' style='height: 155px '></img>
            <input class='w-100 form-control' name='okname' value='".$this->name."'>Name</input>
            <input type='number' class='w-100 form-control' name='okprc' value='".$this->price."'>Prc(hrn)</input>
            <input class='w-100 form-control' name='okhdr' value='".$this->header."'>Hdr</input>
            <input class='w-100 form-control' name='okdscr' value='".$this->descriptions."'>Dscrpt</input><p></p>";

//            </div>";
    }

    public function __destruct()
    {
        // TODO: Implement __destruct() method.
        unset($this->id);
        unset($this->name);
        unset($this->price);
        unset($this->header);
        unset($this->descriptions);
        unset($this->imagepath);
    }
}

