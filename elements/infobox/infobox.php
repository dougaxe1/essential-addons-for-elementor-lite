<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.

class Widget_Eael_Info_Box extends Widget_Base {

	public function get_name() {
		return 'eael-info-box';
	}

	public function get_title() {
		return esc_html__( 'EA Info Box', 'essential-addons-elementor' );
	}

	public function get_icon() {
		return 'fa fa-info';
	}

   public function get_categories() {
		return [ 'essential-addons-elementor' ];
	}
	
	protected function _register_controls() {

  		/**
  		 * Infobox Image Settings
  		 */
  		$this->start_controls_section(
  			'eael_section_infobox_content_settings',
  			[
  				'label' => esc_html__( 'Infobox Image', 'essential-addons-elementor' )
  			]
  		);

  		$this->add_control(
		  'eael_infobox_img_type',
		  	[
		   	'label'       	=> esc_html__( 'Infobox Type', 'essential-addons-elementor' ),
		     	'type' 			=> Controls_Manager::SELECT,
		     	'default' 		=> 'img-on-top',
		     	'label_block' 	=> false,
		     	'options' 		=> [
		     		'img-on-top'  			=> esc_html__( 'Image On Top', 'essential-addons-elementor' ),
		     		'img-on-left' 			=> esc_html__( 'Image On Left', 'essential-addons-elementor' ),
		     		'img-beside-title' 	=> esc_html__( 'Image Beside Title', 'essential-addons-elementor' ),
		     	],
		  	]
		);

		$this->add_responsive_control(
			'eael_infobox_img_or_icon',
			[
				'label' => esc_html__( 'Image or Icon', 'essential-addons-elementor' ),
				'type' => Controls_Manager::CHOOSE,
				'label_block' => true,
				'options' => [
					'img' => [
						'title' => esc_html__( 'Image', 'essential-addons-elementor' ),
						'icon' => 'fa fa-picture-o',
					],
					'icon' => [
						'title' => esc_html__( 'Icon', 'essential-addons-elementor' ),
						'icon' => 'fa fa-info-circle',
					],
				],
				'default' => 'icon',
			]
		);
		/**
		 * Condition: 'eael_infobox_img_or_icon' => 'img'
		 */
		$this->add_control(
			'eael_infobox_image',
			[
				'label' => esc_html__( 'Infobox Image', 'essential-addons-elementor' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'condition' => [
					'eael_infobox_img_or_icon' => 'img'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Image_Size::get_type(),
			[
				'name' => 'thumbnail',
				'default' => 'full',
				'condition' => [
					'eael_infobox_image[url]!' => '',
				],
				'condition' => [
					'eael_infobox_img_or_icon' => 'img'
				]
			]
		);

		$this->add_responsive_control(
			'eael_infobox_img_alignment',
			[
				'label' => esc_html__( 'Image Alignment', 'essential-addons-elementor' ),
				'type' => Controls_Manager::CHOOSE,
				'label_block' => true,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'essential-addons-elementor' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'essential-addons-elementor' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'essential-addons-elementor' ),
						'icon' => 'fa fa-align-right',
					],
				],
				'default' => 'left',
				'prefix_class' => 'eael-infobox-img-align-',
				'condition' => [
					'eael_infobox_img_or_icon' => 'img',
					'eael_infobox_img_type!' => 'img-on-left',
				]
			]
		);
		/**
		 * Condition: 'eael_infobox_img_or_icon' => 'icon'
		 */
		$this->add_control(
			'eael_infobox_icon',
			[
				'label' => esc_html__( 'Icon', 'essential-addons-elementor' ),
				'type' => Controls_Manager::ICON,
				'default' => 'fa fa-building-o',
				'condition' => [
					'eael_infobox_img_or_icon' => 'icon'
				]
			]
		);

		$this->add_responsive_control(
			'eael_infobox_icon_alignment',
			[
				'label' => esc_html__( 'Icon Alignment', 'essential-addons-elementor' ),
				'type' => Controls_Manager::CHOOSE,
				'label_block' => true,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'essential-addons-elementor' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'essential-addons-elementor' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'essential-addons-elementor' ),
						'icon' => 'fa fa-align-right',
					],
				],
				'default' => 'center',
				'prefix_class' => 'eael-infobox-icon-align-',
				'condition' => [
					'eael_infobox_img_or_icon' => 'icon'
				]
			]
		);

		$this->end_controls_section();

		/**
		 * Infobox Content
		 */
		$this->start_controls_section( 
			'eael_infobox_content',
			[
				'label' => esc_html__( 'Infobox Content', 'essential-addons-elementor' ),
			]
		);
		$this->add_control( 
			'eael_infobox_title',
			[
				'label' => esc_html__( 'Infobox Title', 'essential-addons-elementor' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'This is an icon box', 'essential-addons-elementor' )
			]
		);
		$this->add_control( 
			'eael_infobox_text',
			[
				'label' => esc_html__( 'Infobox Text', 'essential-addons-elementor' ),
				'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'default' => esc_html__( 'Write a short description, that will describe the title or something informational and useful.', 'essential-addons-elementor' )
			]
		);
		$this->add_control(
			'eael_show_infobox_content',
			[
				'label' => __( 'Show Content', 'essential-addons-elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'label_on' => __( 'Show', 'essential-addons-elementor' ),
				'label_off' => __( 'Hide', 'essential-addons-elementor' ),
				'return_value' => 'yes',
			]
		);
		$this->add_responsive_control(
			'eael_infobox_content_alignment',
			[
				'label' => esc_html__( 'Content Alignment', 'essential-addons-elementor' ),
				'type' => Controls_Manager::CHOOSE,
				'label_block' => true,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'essential-addons-elementor' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'essential-addons-elementor' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'essential-addons-elementor' ),
						'icon' => 'fa fa-align-right',
					],
				],
				'default' => 'center',
				'prefix_class' => 'eael-infobox-content-align-',
			]
		);
		$this->end_controls_section();

		/**
		 * -------------------------------------------
		 * Tab Style (Info Box Style)
		 * -------------------------------------------
		 */
		$this->start_controls_section(
			'eael_section_infobox_style_settings',
			[
				'label' => esc_html__( 'Info Box Styles', 'essential-addons-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'eael_infobox_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'essential-addons-elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .eael-infobox' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'eael_infobox_container_padding',
			[
				'label' => esc_html__( 'Padding', 'essential-addons-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
	 					'{{WRAPPER}} .eael-infobox' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	 			],
			]
		);

		$this->add_responsive_control(
			'eael_infobox_container_margin',
			[
				'label' => esc_html__( 'Margin', 'essential-addons-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
	 					'{{WRAPPER}} .eael-infobox' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	 			],
			]
		);

		$this->add_control(
			'eael_infobox_border_type',
			[
				'label' => esc_html__( 'Border Type', 'essential-addons-elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'none',
				'options' => [
					'none' 	=> esc_html__( 'None', 'essential-addons-elementor' ),
					'solid' 	=> esc_html__( 'Solid', 'essential-addons-elementor' ),
					'dashed' => esc_html__( 'Dashed', 'essential-addons-elementor' ),
					'dotted' => esc_html__( 'Dotted', 'essential-addons-elementor' ),
					'double' => esc_html__( 'Double', 'essential-addons-elementor' ),
				],
				'selectors' => [
	 					'{{WRAPPER}} .eael-infobox' => 'border-style: {{VALUE}};',
	 			],
			]
		);

		$this->add_control(
			'eael_infobox_border_thickness',
			[
				'label' => esc_html__( 'Border Size', 'essential-addons-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 50,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .eael-infobox' => 'border-width: {{SIZE}}px;',
				],
			]
		);

		$this->add_control(
			'eael_infobox_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'essential-addons-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 500,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .eael-infobox' => 'border-radius: {{SIZE}}px;',
				],
			]
		);

		$this->add_control(
			'eael_infobox_border_color',
			[
				'label' => esc_html__( 'Border Color', 'essential-addons-elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'separator' => 'after',
				'selectors' => [
					'{{WRAPPER}} .eael-infobox' => 'border-color: {{VALUE}};',
				],
			]

		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'eael_infobox_shadow',
				'selector' => '{{WRAPPER}} .eael-infobox',
			]
		);

		$this->end_controls_section();
		/**
		 * -------------------------------------------
		 * Tab Style (Info Box Image)
		 * -------------------------------------------
		 */
		$this->start_controls_section(
			'eael_section_infobox_imgae_style_settings',
			[
				'label' => esc_html__( 'Image Style', 'essential-addons-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
		     		'eael_infobox_img_or_icon' => 'img'
		     	]
			]
		);

		$this->add_control(
		  'eael_infobox_img_shape',
		  	[
		   	'label'     	=> esc_html__( 'Image Shape', 'essential-addons-elementor' ),
		     	'type' 			=> Controls_Manager::SELECT,
		     	'default' 		=> 'circle',
		     	'label_block' 	=> false,
		     	'options' 		=> [
		     		'square'  	=> esc_html__( 'Square', 'essential-addons-elementor' ),
		     		'circle' 	=> esc_html__( 'Circle', 'essential-addons-elementor' ),
		     		'radius' 	=> esc_html__( 'Radius', 'essential-addons-elementor' ),
		     	],
		     	'prefix_class' => 'eael-infobox-shape-',
		     	'condition' => [
		     		'eael_infobox_img_or_icon' => 'img'
		     	]
		  	]
		);

		$this->end_controls_section();

		/**
		 * -------------------------------------------
		 * Tab Style (Info Box Icon Style)
		 * -------------------------------------------
		 */
		$this->start_controls_section(
			'eael_section_infobox_icon_style_settings',
			[
				'label' => esc_html__( 'Icon Style', 'essential-addons-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
		     		'eael_infobox_img_or_icon' => 'icon'
		     	]
			]
		);

		$this->add_control(
    		'eael_infobox_icon_size',
    		[
        		'label' => __( 'Icon Size', 'essential-addons-elementor' ),
       		'type' => Controls_Manager::SLIDER,
        		'default' => [
            	'size' => 40,
        		],
        		'range' => [
            	'px' => [
                	'min' => 20,
                	'max' => 100,
                	'step' => 1,
            	]
        		],
        		'selectors' => [
            	'{{WRAPPER}} .eael-infobox .infobox-icon i' => 'font-size: {{SIZE}}px;',
        		],
    		]
		);

		$this->add_control(
			'eael_infobox_icon_color',
			[
				'label' => esc_html__( 'Icon Color', 'essential-addons-elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#4d4d4d',
				'selectors' => [
					'{{WRAPPER}} .eael-infobox .infobox-icon i' => 'color: {{VALUE}};',
					'{{WRAPPER}} .eael-infobox.icon-beside-title .infobox-content .title figure i' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
		  'eael_infobox_icon_bg_shape',
		  	[
		   	'label'     	=> esc_html__( 'Background Shape', 'essential-addons-elementor' ),
		     	'type' 			=> Controls_Manager::SELECT,
		     	'default' 		=> 'none',
		     	'label_block' 	=> false,
		     	'options' 		=> [
		     		'none'  		=> esc_html__( 'None', 'essential-addons-elementor' ),
		     		'circle' 	=> esc_html__( 'Circle', 'essential-addons-elementor' ),
		     		'radius' 	=> esc_html__( 'Radius', 'essential-addons-elementor' ),
		     		'square' 	=> esc_html__( 'Square', 'essential-addons-elementor' ),
		     	],
		     	'prefix_class' => 'eael-infobox-icon-bg-shape-',
		     	'condition' => [
					'eael_infobox_img_type!' => 'img-on-left'
				]
		  	]
		);

		$this->add_control(
			'eael_infobox_icon_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'essential-addons-elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#f4f4f4',
				'selectors' => [
					'{{WRAPPER}} .eael-infobox .infobox-icon i' => 'background: {{VALUE}};',
				],
				'condition' => [
					'eael_infobox_img_type!' => 'img-on-left',
					'eael_infobox_icon_bg_shape!' => 'none',
				]
			]
		);

		$this->end_controls_section();

		/**
		 * -------------------------------------------
		 * Tab Style (Info Box Title Style)
		 * -------------------------------------------
		 */
		$this->start_controls_section(
			'eael_section_infobox_title_style_settings',
			[
				'label' => esc_html__( 'Title Typography &amp; Color', 'essential-addons-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
             'name' => 'eael_infobox_title_typography',
				'selector' => '{{WRAPPER}} .eael-infobox .infobox-content .title',
			]
		);

		$this->add_control(
			'eael_infobox_title_color',
			[
				'label' => esc_html__( 'Color', 'essential-addons-elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#4d4d4d',
				'selectors' => [
					'{{WRAPPER}} .eael-infobox .infobox-content .title' => 'color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();

		/**
		 * -------------------------------------------
		 * Tab Style (Info Box Content Style)
		 * -------------------------------------------
		 */
		$this->start_controls_section(
			'eael_section_infobox_content_style_settings',
			[
				'label' => esc_html__( 'Content Typography &amp; Color', 'essential-addons-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
             'name' => 'eael_infobox_content_typography',
				'selector' => '{{WRAPPER}} .eael-infobox .infobox-content p',
			]
		);

		$this->add_control(
			'eael_infobox_content_color',
			[
				'label' => esc_html__( 'Color', 'essential-addons-elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#4d4d4d',
				'selectors' => [
					'{{WRAPPER}} .eael-infobox .infobox-content p' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->end_controls_section();

	}


	protected function render( ) {
		
   	$settings = $this->get_settings();
      $infobox_image = $this->get_settings( 'eael_infobox_image' );
	  	$infobox_image_url = Group_Control_Image_Size::get_attachment_image_src( $infobox_image['id'], 'thumbnail', $settings );	
	
	?>
		<?php if( 'img-on-top' == $settings['eael_infobox_img_type'] ) : ?>
		<div class="eael-infobox">
			<div class="infobox-icon">
				<?php if( 'img' == $settings['eael_infobox_img_or_icon'] ) : ?>
				<figure>
					<img src="<?php echo esc_url( $infobox_image_url ); ?>" alt="Icon Image">
				</figure>
				<?php endif; ?>
				<?php if( 'icon' == $settings['eael_infobox_img_or_icon'] ) : ?>
				<i class="<?php echo esc_attr( $settings['eael_infobox_icon'] ); ?>"></i>
				<?php endif; ?>
			</div>
			<div class="infobox-content">
				<h4 class="title"><?php echo $settings['eael_infobox_title']; ?></h4>
				<?php if( 'yes' == $settings['eael_show_infobox_content'] ) : ?>
					<p><?php echo $settings['eael_infobox_text']; ?></p>
				<?php endif; ?>
			</div>
		</div>
		<?php endif; ?>
		<?php if( 'img-on-left' == $settings['eael_infobox_img_type'] ) : ?>
		<div class="eael-infobox icon-on-left">
			<div class="infobox-icon <?php if( 'icon' == $settings['eael_infobox_img_or_icon'] ) : echo esc_attr( 'eael-icon-only', 'essential-addons-elementor' ); endif; ?>">
				<?php if( 'img' == $settings['eael_infobox_img_or_icon'] ) : ?>
				<figure>
					<img src="<?php echo esc_url( $infobox_image_url ); ?>" alt="Icon Image">
				</figure>
				<?php endif; ?>
				<?php if( 'icon' == $settings['eael_infobox_img_or_icon'] ) : ?>
				<i class="<?php echo esc_attr( $settings['eael_infobox_icon'] ); ?>"></i>
				<?php endif; ?>
			</div>
			<div class="infobox-content <?php if( 'icon' == $settings['eael_infobox_img_or_icon'] ) : echo esc_attr( 'eael-icon-only', 'essential-addons-elementor' ); endif; ?>">
				<h4 class="title"><?php echo $settings['eael_infobox_title']; ?></h4>
				<?php if( 'yes' == $settings['eael_show_infobox_content'] ) : ?>
					<p><?php echo $settings['eael_infobox_text']; ?></p>
				<?php endif; ?>
			</div>
		</div>
		<?php endif; ?>
		<?php if( 'img-beside-title' == $settings['eael_infobox_img_type'] ) : ?>
		<div class="eael-infobox icon-beside-title">
			<div class="infobox-content">
				<h4 class="title <?php if( 'icon' == $settings['eael_infobox_img_or_icon'] ) : echo esc_attr( 'eael-icon-only', 'essential-addons-elementor' ); endif; ?>">
					<?php if( 'img' == $settings['eael_infobox_img_or_icon'] ) : ?>
					<figure>
						<img src="<?php echo esc_url( $infobox_image_url ); ?>" alt="Icon Image">
					</figure>
					<?php endif; ?>
					<?php if( 'icon' == $settings['eael_infobox_img_or_icon'] ) : ?>
					<figure>
					<i class="<?php echo esc_attr( $settings['eael_infobox_icon'] ); ?>"></i>
					</figure>
					<?php endif; ?>
					<?php echo $settings['eael_infobox_title']; ?>
				</h4>
				<?php if( 'yes' == $settings['eael_show_infobox_content'] ) : ?>
					<p><?php echo $settings['eael_infobox_text']; ?></p>
				<?php endif; ?>
			</div>
		</div>
		<?php endif; ?>
	<?php
	}

	protected function content_template() {
		
		?>
		
	
		<?php
	}
}


Plugin::instance()->widgets_manager->register_widget_type( new Widget_Eael_Info_Box() );