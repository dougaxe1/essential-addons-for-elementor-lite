<div id="tools" class="eael-grid eael-admin-setting-tab">
    <div class="eael-container eael-block">
        <div class="p30">
            <div class="eael-grid">
                <div class="eael-col-md-5">
                    <div class="eael-tool__card eael-tool__card--flex">
                        <div class="icon">
                            <img src="<?php echo esc_url( EAEL_PLUGIN_URL . 'assets/admin/images/tool-1.svg' ) ?>" alt="">
                        </div>
                        <div class="content">
                            <h3>Regenerate Assets</h3>
                            <p>Essential Addons styles & scripts are saved in Uploads folder. This option will clear all
                                those generated files.</p>
                        </div>
                    </div>
                </div>
                <div class="eael-col-md-7">
                    <div class="eael-tool__card">
                        <div class="content">
                            <a href="#" id="eael-regenerate-files" class="eael-button button__themeColor mb20">Regenerate Assets</a>
                            <p>CSS Print Method is handled by Elementor Settings itself. Use External CSS Files for
                                better
                                performance (recommended).</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="line"></div>
        <div class="p30">
            <div class="eael-grid">
                <div class="eael-col-md-5">
                    <div class="eael-tool__card eael-tool__card--flex">
                        <div class="icon">
                            <img src="<?php echo esc_url( EAEL_PLUGIN_URL . 'assets/admin/images/tool-2.svg' ) ?>" alt="">
                        </div>
                        <div class="content">
                            <h3>Assets Embed Method</h3>
                            <p>Configure the Essential Addons assets embed method. Keep it as default (recommended).</p>
                        </div>
                    </div>
                </div>
                <div class="eael-col-md-7">
                    <div class="eael-tool__card">
                        <div class="content">
                            <a href="<?php echo esc_url(admin_url('admin.php?page=elementor#tab-advanced')); ?>" target="_blank" class="eael-button button__themeColor mb20">CSS Print Method</a>
                            <p>CSS Print Method is handled by Elementor Settings itself. Use External CSS Files for
                                better
                                performance (recommended).</p>
                        </div>
	                    <?php
	                    $print_method = get_option('eael_js_print_method','external');
	                    ?>
                        <div class="content mt30">
                            <div class="eael__flex  align__center mb20">
                                <h5 class="mr20">JS Print Method</h5>
                                <div class="eael-select">
                                    <select name="eael-js-print-method" id="eael-js-print-method">
                                        <option value="external" <?php echo $print_method == 'external' ? 'selected' : '' ?>><?php _e('External File', 'essential-addons-for-elementor-lite');?></option>
                                        <option value="internal" <?php echo $print_method == 'internal' ? 'selected' : '' ?>><?php _e('Internal Embedding', 'essential-addons-for-elementor-lite');?></option>
                                    </select>
                                </div>
                            </div>
                            <p>CSS Print Method is handled by Elementor Settings itself. Use External CSS Files for
                                better
                                performance (recommended).</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


