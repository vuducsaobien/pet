@php
    use App\Models\SettingModel;
    use App\Models\MenuModel;

    $settingModel = new SettingModel();
    $items = $settingModel->getItem(null, ['task' => 'news-list-items-footer']);

    $menuModel = new MenuModel();
    $itemsMenu = $menuModel->listItems(null, ['task' => 'news-list-items-footer']);

    $general = @$items['general'];
    $social = @$items['social'];

    $logo = $general['logo'];
@endphp

<footer class="footer-area">
    <div class="footer-top pt-80 pb-50 gray-bg-2">
        <div class="container">
            <div class="row">

                <!-- Logo -->
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                    <div class="footer-widget mb-30">
                        <div class="footer-info-wrapper">

                            @include('news.elements.footer.footer_logo')

                        </div>
                    </div>
                </div>

                <!-- USEFUL LINKS -->
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                    <div class="footer-widget mb-30 pl-50">
                        <h4 class="footer-title">USEFUL LINKS</h4>

                        @include('news.elements.footer.footer_useful')

                    </div>
                </div>

                <!-- Info -->
                <div class="col-xl-3 col-lg-2 col-md-6 col-sm-6">
                    <div class="footer-widget mb-30 pl-70">
                        <h4 class="footer-title">Thông tin</h4>

                        @include('news.elements.footer.footer_info')

                    </div>
                </div>

                <!-- Subscribe -->
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                    <div class="footer-widget">

                        @include('news.elements.footer.footer_subscribe')

                    </div>
                </div>
                
            </div>
        </div>
    </div>

    <!-- Copyright -->
    @include('news.elements.footer.footer_copyright')

</footer>
