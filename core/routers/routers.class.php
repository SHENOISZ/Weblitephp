
<?php 


class Routers {

	private $url;

	function __construct($args) {

		$this->url = $args;

	}

	public function request() {

		$context = [];

		foreach (explode(',', $this->url) as $item) {

			$item = explode(':', $item);
			$context[$item[0]] = $item[1];
		}

		return $context;
	}

}

?>