<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Presale_Counter_Widget extends \Elementor\Widget_Base {
    public function get_name() {
        return 'cronos-presale-counter';
    }

    public function get_title() {
        return __('Presale Counter', 'cronos-presale-counter');
    }

    public function get_icon() {
        return 'eicon-counter';
    }

    public function get_categories() {
        return ['general'];
    }

    protected function _register_controls() {
        // Content Section
        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Content', 'cronos-presale-counter'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'heading_text',
            [
                'label' => __('Heading Text', 'cronos-presale-counter'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => esc_html__( 'Heading', 'cronos-presale-counter' ),
            ]
        );

        $this->add_control(
            'target_text',
            [
                'label' => __('Target Text', 'cronos-presale-counter'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => esc_html__( 'Target', 'cronos-presale-counter' ),
            ]
        );

        $this->add_control(
            'target_contribution',
            [
                'label' => __('Target CRO Contribution', 'cronos-presale-counter'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 6250000,
                'min' => 0,
                'max' => 10000000,
                'step' => 1000,
            ]
        );

        $this->add_control(
            'amount_text',
            [
                'label' => __('Amount Text', 'cronos-presale-counter'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => esc_html__( 'Amount', 'textdomain' ),
            ]
        );

        $this->add_control(
            'purchase_text',
            [
                'label' => __('Purchase Text', 'cronos-presale-counter'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => esc_html__( 'Purchase', 'textdomain' ),
            ]
        );

        $this->add_control(
            'svg_url',
            [
                'label' => __('SVG Url', 'cronos-presale-counter'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'placeholder' => esc_html__( 'Purchase', 'textdomain' ),
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'style_section',
            [
                'label' => __('Box Style', 'cronos-presale-counter'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'background_color',
            [
                'label' => __( 'Background Color', 'cronos-presale-counter' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} #cronos-presale-counter' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'border_width',
            [
                'label' => __( 'Border Width', 'cronos-presale-counter' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'selectors' => [
                    '{{WRAPPER}} #cronos-presale-counter' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'border_style',
            [
                'label' => __( 'Border Style', 'cronos-presale-counter' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'none' => __( 'None', 'cronos-presale-counter' ),
                    'solid' => __( 'Solid', 'cronos-presale-counter' ),
                    'dashed' => __( 'Dashed', 'cronos-presale-counter' ),
                    'dotted' => __( 'Dotted', 'cronos-presale-counter' ),
                    'double' => __( 'Double', 'cronos-presale-counter' ),
                ],
                'selectors' => [
                    '{{WRAPPER}} #cronos-presale-counter' => 'border-style: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'border_color',
            [
                'label' => __( 'Border Color', 'cronos-presale-counter' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} #cronos-presale-counter' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'border_radius',
            [
                'label' => __( 'Border Radius', 'cronos-presale-counter' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'selectors' => [
                    '{{WRAPPER}} #cronos-presale-counter' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'max_width',
            [
                'label' => __( 'Max Width (%)', 'cronos-presale-counter' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} #cronos-presale-counter' => 'max-width: {{SIZE}}%;',
                ],
            ]
        );

        $this->add_responsive_control(
            'min_width',
            [
                'label' => __( 'Min Width', 'cronos-presale-counter' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 600,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
                'selectors' => [
                    '{{WRAPPER}} #cronos-presale-counter' => 'min-width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'margin',
            [
                'label' => __( 'Margin', 'cronos-presale-counter' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em', 'rem' ],
                'selectors' => [
                    '{{WRAPPER}} #cronos-presale-counter' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'padding',
            [
                'label' => __( 'Padding', 'cronos-presale-counter' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em', 'rem' ],
                'selectors' => [
                    '{{WRAPPER}} #cronos-presale-counter' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'text_alignment',
            [
                'label' => __( 'Text Alignment', 'cronos-presale-counter' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __( 'Left', 'cronos-presale-counter' ),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'cronos-presale-counter' ),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => __( 'Right', 'cronos-presale-counter' ),
                        'icon' => 'eicon-text-align-right',
                    ],
                    'justify' => [
                        'title' => __( 'Justified', 'cronos-presale-counter' ),
                        'icon' => 'eicon-text-align-justify',
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} #cronos-presale-counter' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'box_shadow',
                'label' => __( 'Box Shadow', 'cronos-presale-counter' ),
                'selector' => '{{WRAPPER}} #cronos-presale-counter',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'content_style_section',
            [
                'label' => __('Content', 'cronos-presale-counter'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        
        $this->add_control(
            'counter_heading_font_size',
            [
                'label' => __( 'Heading Font Size', 'cronos-presale-counter' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%', 'em', 'rem' ],
                'selectors' => [
                    '{{WRAPPER}} #cronos-presale-counter h2' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        
        $this->add_control(
            'counter_heading_font_weight',
            [
                'label' => __( 'Heading Font Weight', 'cronos-presale-counter' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 100,
                        'max' => 1000,
                        'step' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} #cronos-presale-counter h2' => 'font-weight: {{SIZE}};',
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'countdown_style_section',
            [
                'label' => __('Countdown', 'cronos-presale-counter'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        
        $this->add_control(
            'countdown_box_heading_font_size',
            [
                'label' => __( 'Heading Font Size', 'cronos-presale-counter' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%', 'em', 'rem' ],
                'selectors' => [
                    '{{WRAPPER}} .countdown-box h3' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'countdown_box_heading_font_weight',
            [
                'label' => __( 'Heading Font Weight', 'cronos-presale-counter' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 100,
                        'max' => 1000,
                        'step' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .countdown-box h3' => 'font-weight: {{SIZE}};',
                ],
            ]
        );

        $this->add_control(
            'countdown_box_font_size',
            [
                'label' => __( 'Font Size', 'cronos-presale-counter' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%', 'em', 'rem' ],
                'selectors' => [
                    '{{WRAPPER}} .countdown-box' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        
        $this->add_control(
            'countdown_box_width',
            [
                'label' => __( 'Width (%)', 'cronos-presale-counter' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .countdown-box' => 'width: {{SIZE}}%;',
                ],
            ]
        );
        
        $this->end_controls_section();

        $this->start_controls_section(
            'progress_style_section',
            [
                'label' => __('Progress Bar', 'cronos-presale-counter'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'progress_bar_progress_height',
            [
                'label' => __( 'Progress Bar Height (px) ', 'cronos-presale-counter' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .progress-bar .progress' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'progress_bar_width',
            [
                'label' => __( 'Progress Bar Width (%)', 'cronos-presale-counter' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .progress-bar' => 'width: {{SIZE}}%;',
                ],
            ]
        );
        
        $this->add_control(
            'progress_bar_background_color',
            [
                'label' => __( 'Progress Bar Background Color', 'cronos-presale-counter' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .progress-bar' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        
        $this->add_control(
            'progress_bar_border_radius',
            [
                'label' => __( 'Progress Bar Border Radius', 'cronos-presale-counter' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'selectors' => [
                    '{{WRAPPER}} .progress-bar' => 'border-radius: {{TOP}}{{UNIT}};',
                    '{{WRAPPER}}.progress-bar .progress' => 'border-radius: {{TOP}}{{UNIT}};',
                ],
            ]
        );
        
        $this->add_control(
            'progress_bar_progress_color',
            [
                'label' => __( 'Progress Bar Color', 'cronos-presale-counter' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .progress-bar .progress' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'counter_paragraph_font_size',
            [
                'label' => __( 'Contribution Font Size', 'cronos-presale-counter' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%', 'em', 'rem' ],
                'selectors' => [
                    '{{WRAPPER}} #cronos-presale-counter #cro-contributed, #cronos-presale-counter #target-contribution, #cronos-presale-counter #cro-raised' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'contribution_font_weight',
            [
                'label' => __( 'Contribution Font Weight', 'cronos-presale-counter' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 100,
                        'max' => 1000,
                        'step' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} #cronos-presale-counter #cro-raised' => 'font-weight: {{SIZE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'contribution_padding',
            [
                'label' => __( 'Contribution Padding', 'cronos-presale-counter' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em', 'rem' ],
                'selectors' => [
                    '{{WRAPPER}} #cronos-presale-counter .contribution-inline' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

         // Style Section
        $this->start_controls_section(
            'style_section',
            [
                'label' => __('Box Style', 'cronos-presale-counter'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'background_color',
            [
                'label' => __( 'Background Color', 'cronos-presale-counter' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} #cronos-presale-counter' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'border_width',
            [
                'label' => __( 'Border Width', 'cronos-presale-counter' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'selectors' => [
                    '{{WRAPPER}} #cronos-presale-counter' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'border_style',
            [
                'label' => __( 'Border Style', 'cronos-presale-counter' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'none' => __( 'None', 'cronos-presale-counter' ),
                    'solid' => __( 'Solid', 'cronos-presale-counter' ),
                    'dashed' => __( 'Dashed', 'cronos-presale-counter' ),
                    'dotted' => __( 'Dotted', 'cronos-presale-counter' ),
                    'double' => __( 'Double', 'cronos-presale-counter' ),
                ],
                'selectors' => [
                    '{{WRAPPER}} #cronos-presale-counter' => 'border-style: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'border_color',
            [
                'label' => __( 'Border Color', 'cronos-presale-counter' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} #cronos-presale-counter' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'border_radius',
            [
                'label' => __( 'Border Radius', 'cronos-presale-counter' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'selectors' => [
                    '{{WRAPPER}} #cronos-presale-counter' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'max_width',
            [
                'label' => __( 'Max Width (%)', 'cronos-presale-counter' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} #cronos-presale-counter' => 'max-width: {{SIZE}}%;',
                ],
            ]
        );

        $this->add_responsive_control(
            'min_width',
            [
                'label' => __( 'Min Width', 'cronos-presale-counter' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 600,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
                'selectors' => [
                    '{{WRAPPER}} #cronos-presale-counter' => 'min-width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'margin',
            [
                'label' => __( 'Margin', 'cronos-presale-counter' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em', 'rem' ],
                'selectors' => [
                    '{{WRAPPER}} #cronos-presale-counter' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'padding',
            [
                'label' => __( 'Padding', 'cronos-presale-counter' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em', 'rem' ],
                'selectors' => [
                    '{{WRAPPER}} #cronos-presale-counter' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'text_alignment',
            [
                'label' => __( 'Text Alignment', 'cronos-presale-counter' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __( 'Left', 'cronos-presale-counter' ),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'cronos-presale-counter' ),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => __( 'Right', 'cronos-presale-counter' ),
                        'icon' => 'eicon-text-align-right',
                    ],
                    'justify' => [
                        'title' => __( 'Justified', 'cronos-presale-counter' ),
                        'icon' => 'eicon-text-align-justify',
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} #cronos-presale-counter' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'box_shadow',
                'label' => __( 'Box Shadow', 'cronos-presale-counter' ),
                'selector' => '{{WRAPPER}} #cronos-presale-counter',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'content_style_section',
            [
                'label' => __('Content', 'cronos-presale-counter'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        
        $this->add_control(
            'counter_heading_font_size',
            [
                'label' => __( 'Heading Font Size', 'cronos-presale-counter' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%', 'em', 'rem' ],
                'selectors' => [
                    '{{WRAPPER}} #cronos-presale-counter h2' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        
        $this->add_control(
            'counter_heading_font_weight',
            [
                'label' => __( 'Heading Font Weight', 'cronos-presale-counter' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'range' => [
                    'px' => [ // Ensure you specify the unit for the range
                        'min' => 100, // Minimum value allowed
                        'max' => 1000, // Maximum value allowed
                        'step' => 100, // Step value for the number input
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} #cronos-presale-counter h2' => 'font-weight: {{SIZE}};',
                ],
            ]
        );
        
        $this->end_controls_section();

        $this->start_controls_section(
            'purchase_style_section',
            [
                'label' => __('Purchase', 'cronos-presale-counter'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        
        $this->add_responsive_control(
            'purchase_padding',
            [
                'label' => __( 'Amount Padding', 'cronos-presale-counter' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em', 'rem' ],
                'selectors' => [
                    '{{WRAPPER}} #contribution-amount' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'purchase_margin',
            [
                'label' => __( 'Amount Margin', 'cronos-presale-counter' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em', 'rem' ],
                'selectors' => [
                    '{{WRAPPER}} #contribution-amount' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'purchase_radius',
            [
                'label' => __( 'Amount Border Radius', 'cronos-presale-counter' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'selectors' => [
                    '{{WRAPPER}} #contribution-amount' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'purchase_alignment',
            [
                'label' => __( 'Amount Text Alignment', 'cronos-presale-counter' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __( 'Left', 'cronos-presale-counter' ),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'cronos-presale-counter' ),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => __( 'Right', 'cronos-presale-counter' ),
                        'icon' => 'eicon-text-align-right',
                    ],
                    'justify' => [
                        'title' => __( 'Justified', 'cronos-presale-counter' ),
                        'icon' => 'eicon-text-align-justify',
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} #contribution-amount' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'contribute_b_padding',
            [
                'label' => __( 'Button Padding', 'cronos-presale-counter' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em', 'rem' ],
                'selectors' => [
                    '{{WRAPPER}} #contribute-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'contribute_b_margin',
            [
                'label' => __( 'Button Margin', 'cronos-presale-counter' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em', 'rem' ],
                'selectors' => [
                    '{{WRAPPER}} #contribute-button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'contribute_b_radius',
            [
                'label' => __( 'Button Border Radius', 'cronos-presale-counter' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'selectors' => [
                    '{{WRAPPER}} #contribute-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'contribute_b_width',
            [
                'label' => __( 'Button Width (%)', 'cronos-presale-counter' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ '%' ],
				'range' => [
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
                'selectors' => [
                    '{{WRAPPER}} button#contribute-button' => 'width: {{SIZE}}%;',
                ],
            ]
        );

        $this->add_responsive_control(
            'contribute_b_alignment',
            [
                'label' => __( 'Button Text Alignment', 'cronos-presale-counter' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __( 'Left', 'cronos-presale-counter' ),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'cronos-presale-counter' ),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => __( 'Right', 'cronos-presale-counter' ),
                        'icon' => 'eicon-text-align-right',
                    ],
                    'justify' => [
                        'title' => __( 'Justified', 'cronos-presale-counter' ),
                        'icon' => 'eicon-text-align-justify',
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} #contribute-button' => 'justify-content: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'contribute_b_background',
            [
                'label' => __('Button Background Color', 'cronos-presale-counter'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} #contribute-button' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'contribute_b_hover_background',
            [
                'label' => __('Hover Background Color', 'cronos-presale-counter'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} #contribute-button:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings();

        $target_contribution = !empty($settings['target_contribution']) ? $settings['target_contribution'] : 6250000;
        $svg_url = $this->get_settings_for_display('svg_url');
        $svg_url = $svg_url['url'];

        ?>
        <div id="cronos-presale-counter">
            <?php
            if ( !empty( $settings['heading_text']) ) {
            echo '<h2>'. $settings['heading_text'] .'</h2>';
            }
            ?>
            <div class="countdown-box">
                <h3>Days</h3>
                <p id="countdown-days">00</p>
            </div>
            <div class="countdown-box">
                <h3>Hours</h3>
                <p id="countdown-hours">00</p>
            </div>
            <div class="countdown-box">
                <h3>Mins</h3>
                <p id="countdown-minutes">00</p>
            </div>
            <div class="countdown-box">
                <h3>Secs</h3>
                <p id="countdown-seconds">00</p>
            </div>
            <div class="progress-bar">
                <div class="progress" style="width: 0%;"></div>
            </div>
            
            <div class="contribution-inline">
                <div id="cro-raised">CRO raised:&nbsp;</div>
                <div id="cro-contributed"></div>
                <div id="target-contribution">&nbsp;/ <?php echo number_format($target_contribution); ?> <?php echo $settings['target_text']; ?></div>
            </div>
            <input type="number" id="contribution-amount" placeholder="<?php echo $settings['amount_text']; ?>">
            <button id="contribute-button" disabled>
                <img src="<?php echo $svg_url;?>" style="height:20px; margin-right:5px; width:auto;" alt="Contribute with MetaMask">
                <?php echo $settings['purchase_text'];?>
            </button>
            <div id="sale-not-started">Not Yet Started</div>
        </div>
        <script src="<?php echo plugin_dir_url( __FILE__ ) . 'js/web3.min.js'; ?>"></script>
        <script src="<?php echo plugin_dir_url( __FILE__ ) . 'js/cronos-presale-counter.js'; ?>"></script>
        <?php
    }
}