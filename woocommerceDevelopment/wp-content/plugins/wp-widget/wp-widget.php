<?php 
/*
Plugin name: OWT WP Widget
Description: This is widget plugin which creates wp widget while activation
Author: Jyoti Deshmukh
version: 1.0
*/

// custom widget class
class My_Widget extends WP_Widget{
	public function __construct(){
		parent::__construct( // widget id and widget name passed in constructer
		"owt-my-widget","My Widget"
		);
		add_action("widgets_init",function(){
			register_widget("My_Widget");
		});
	}
	// form method - this method is able to create admin panel layout for backend
	// This get_field_id and get_field_name function should be used in form() methods to create unique id attributes for fields to be saved by WP_Widget::update()
	public function form($instance){ 
	$title = !empty($instance['title'])? $instance['title']: "";
	$description = !empty($instance['description']) ? $instance['description']: "";
	?>
		<p>
			<label for="<?php echo $this->get_field_id('title');?>">Title</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('title');?>" name="<?php echo $this->get_field_name('title');?>" value="<?php echo $title; ?>" placeholder="Enter Title">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('description');?>">Description</label>
			<textarea class="widefat" id="<?php echo $this->get_field_id('description');?>" name="<?php echo $this->get_field_name('description');?>" placeholder="Enter Description"><?php echo $description; ?></textarea>
		</p>
	<?php }
	
	// update method - this method is used to save/update data while we save data from widget to database
	public function update($new_instance,$old_instance){
		$instance = array();
		$instance['title'] = !empty($new_instance["title"]) ?strip_tags($new_instance["title"]): "";
		$instance['description'] = !empty($new_instance["description"])?strip_tags($new_instance["description"]):"";
		return $instance;
	}
	// widget method - this will provide a layout for frontend
	function widget($args,$instance){
		echo $args['before_title'];
		if(!empty($instance['title'])){
			echo $instance['title'];
		}
		echo $args['after_title'];
		echo $args['before_widget'];
		if(!empty($instance['description'])){
			echo $instance['description'];
		}
		echo $instance['after_widget'];
	}
}
$my_widget = new My_Widget();
?>