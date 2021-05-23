<?php 
/*
Plugin name: OWT COVID19 Widget
Description: This plugin will creates a widget which provides the stats of COVID19.
Author: Jyoti Deshmukh
Version: 1.0
*/
class OWT_COVID19_Widget extends WP_Widget{
	public function __construct(){
		parent::__construct("Covid-19-widget","OWT COVID19");
		add_action("widgets_init",function(){
			register_widget("OWT_COVID19_Widget");
		});
	}
	public function form($instance){
		// admin layout
		$title = !empty($instance['title'])? $instance['title']: "";
		?>
		<p>
			<label for="<?php echo $this->get_field_id('title');?>">Title</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('title');?>" name="<?php echo $this->get_field_name('title');?>" value="<?php echo $title; ?>" placeholder="Enter Title">
		</p>
		<?php
	}
	public function update($new_instance,$old_instance){
		// update the values and save to the database
		$instance = array();
		$instance['title'] = !empty($new_instance["title"]) ?strip_tags($new_instance["title"]): "";
		return $instance;
	}
	public function widget($args,$instance){
		// render widget content to frontend
		echo $args['before_title'];
		if(!empty($instance['title'])){
			echo $instance['title'];
		}
		echo $args['after_title'];
		echo $args['before_widget'];
		$covid19_data = $this->get_covid19_data();
		$data = json_decode($covid19_data);
		$global_data = isset($data->Global) ? $data->Global : array();
		$countries_data = isset($data->Countries) ? $data->Countries : array();
		echo "<pre>";
		//print_r($global_data);
		echo "</pre>";
		echo '<table class="table table-bordered">
    <thead>
      <tr>
        <th>Total Confirmed</th>
        <th>Total Deaths</th>
        <th>Total Recovered</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>'.$global_data->TotalConfirmed.'</td>
        <td>'.$global_data->TotalDeaths.'</td>
        <td>'.$global_data->TotalRecovered.'</td>
      </tr>
    </tbody>
  </table>';
  $country_data = "";
  foreach ($countries_data as $key=>$value){
	  $country_data .= '<tr>
        <td>'.$value->Country.'</td>
        <td>'.$value->CountryCode.'</td>
        <td>'.$value->TotalConfirmed.'</td>
		<td>'.$value->TotalDeaths.'</td>
		<td>'.$value->TotalRecovered.'</td>
      </tr>';
	}
	echo '<table class="table table-bordered">
    <thead>
      <tr>
		<th>Country</th>
		<th>Country Code</th>
        <th>Total Confirmed</th>
        <th>Total Deaths</th>
        <th>Total Recovered</th>
      </tr>
    </thead>
    <tbody>
      '.$country_data.'
    </tbody>
  </table>';
		echo $instance['after_widget'];
	}
	public function get_covid19_data(){
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, 'https://api.covid19api.com/summary');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$result = curl_exec($ch);
		if (curl_errno($ch)) {
			echo 'Error:' . curl_error($ch);
		}
		curl_close ($ch);
		return $result;
	}
}
$owt_covid19_widget = new OWT_COVID19_Widget();