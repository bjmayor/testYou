<?phpclass User_model extends CI_Model {    public static $TBNAME = "user";    public $username;    public $email;    public $password;    public $create_time;    public $mobile;    public $openid;    public $other_uid;    public $other_type;    public function __construct()    {        parent::__construct();        $this->load->database();    }}?>