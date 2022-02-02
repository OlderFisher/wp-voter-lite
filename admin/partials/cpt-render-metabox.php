<?php

$titles_array       = get_post_meta( $post->ID, self::META_BOX_TITLES, true );
$settings_array     = get_post_meta( $post->ID, self::META_BOX_SETTINGS, true );
$statistics_array   = get_post_meta( $post->ID, self::META_BOX_STATISTICS, true );

do_action('qm/debug', $titles_array ) ;
do_action('qm/debug', $settings_array ) ;
do_action('qm/debug', $statistics_array ) ;

?>
<div id="alwp_vote_header">
    <p>VOTE QUESTION</p>
    <div class="alwp_vote_settings">
        <label for="alwp_vote_question">Vote Question</label>
        <input id="alwp_vote_question" name="alwp_vote_question" type="text" value="">
    </div>
    <div class="alwp_vote_settings">
        <label for="alwp_vote_comment">Vote Comment</label>
        <input id="alwp_vote_comment" name="alwp_vote_comment" type="text" value="">
    </div>
</div>
<div class="alwp_vote_body">
    <p>VOTE ANSWERS</p>
    <?php
        for ( $i = 1 ; $i < 4 ; $i++ ){
	      echo  '<div id="alwp_vote_body_'.$i.'" class="alwp_vote_settings">';
          echo  '<label for="alwp_vote_answer_input_'.$i.'">Answer #'.$i.'</label>';
          echo  '<input id="alwp_vote_answer_input_'.$i.'" name="alwp_vote_answer_input_'.$i.'" type="text" value="">';
          echo  '</div>';
        }
    ?>
</div>
<br/>
<hr/>
<p>VOTE COLORS & FONTS</p>
<div class="alwp_vote_colors">
    <div class="alwp_vote_colors_settings">
        <div class="alwp_vote_settings alwp_colors_settings">
            <label for="alwp_color_bg">Background Color</label>
            <input name="alwp_color_bg" type="text" value="#f0f0f1">
        </div>
        <div class="alwp_vote_settings alwp_colors_settings">
            <label for="alwp_header_tag">Header Tag</label>
            <select name="alwp_header_tag">
                <option value="h1">H1</option>
                <option value="h2">H2</option>
                <option value="h3" selected>H3</option>
                <option value="h4">H4</option>
                <option value="h5">H5</option>
                <option value="h6">H6</option>
            </select>
        </div>
        <div class="alwp_vote_settings alwp_colors_settings">
            <label for="alwp_color_bg">Header Font Color</label>
            <input name="alwp_color_bg" type="text" value="#000000">
        </div>

        <div class="alwp_vote_settings alwp_colors_settings">
            <label for="alwp_color_ft">Font Color</label>
            <input name="alwp_color_ft" type="text" value="#000000">
        </div>
        <div class="alwp_vote_settings alwp_colors_settings">
            <label for="alwp_font_size">Font Size</label>
            <input name="alwp_font_size" type="number" value="15" min="5" max="30" style="width:55px;"><span class="font_size_px_span">px</span>
        </div>
        <div class="alwp_vote_settings alwp_colors_settings">
            <label for="alwp_color_bar">Bar Color</label>
            <input name="alwp_color_bar" type="text" value="#0000ff">
        </div>
        <div class="alwp_vote_settings alwp_colors_settings">
            <label for="alwp_bar_height">Bar Height</label>
            <input name="alwp_bar_height" type="number" value="10" min="1" max="20" style="width:55px;"><span class="alwp_font_size_px_span">px</span>
        </div>

        <div class="alwp_vote_settings alwp_colors_settings">
            <label for="alwp_percent_color_ft"> % Font Color</label>
            <input name="alwp_percent_color_ft" type="text" value="#000000">
        </div>
        <div class="alwp_vote_settings alwp_colors_settings">
            <label for="alwp_percent_font_size">% Font Size</label>
            <input name="alwp_percent_font_size" type="number" value="15" min="5" max="30" style="width:55px;"><span class="font_size_px_span">px</span>
        </div>

    </div>
    <div class="alwp_vote_colors_display">
        <div class="alwp_voter_colors_widget">
            <h3 id="alwp_vote_question_output">Vote Question</h3>
            <p id="alwp_vote_comments_output">Vote comments - Any comments about the Vote purpose and role </p>
            <ul class="alwp_vote_answers">
                <li id="alwp_vote_answer_1" class="alwp_vote_answer">Answer #1 <span class="alwp_vote_bar"></span><span class="alwp_vote_percentage">100%</span></li>
                <li id="alwp_vote_answer_2" class="alwp_vote_answer">Answer #2 <span class="alwp_vote_bar"></span><span class="alwp_vote_percentage">100%</span></li>
                <li id="alwp_vote_answer_3" class="alwp_vote_answer">Answer #3 <span class="alwp_vote_bar"></span><span class="alwp_vote_percentage">100%</span></li>
            </ul>
        </div>
    </div>
</div>



