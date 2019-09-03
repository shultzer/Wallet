@extends('blades.base')

@section('page title', 'Index')
<script>
    window.onload = function() {
        var d = new Date().getTime();
        document.getElementById("tid").value = d;
    };
</script>
@section('innerbanner')
    <!-- innerbanner -->
    {{-- <div class="agileits-inner-banner">

    </div> --}}
    <!-- //innerbanner -->
@endsection

@section('breadcrumbs')
@endsection

@section('horizontal tab')

@endsection
@section('css')
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="{{ asset('css/travel.css')}}">
    <link rel="stylesheet" href="{{ asset('css/custom.css')}}">
    <link rel="stylesheet" href="{{ asset('css/tool-tip.css')}}">
@endsection

@section('vertical tab')
    <!--Vertical Tab-->
    <div class="categories-section main-grid-border" id="mobilew3layouts">
        <div class="container">
            <div class="category-list">
                <div id="parentVerticalTab">
                    <div class="agileits-tab_nav">
                    </div>
                    <div class="resp-tabs-container hor_1">
                        <form method="post" name="customerData" action="/ccavRequestHandler">
                            {{ @csrf_field() }}
                            <table width="40%" height="100" border='1' align="center"><caption><font size="4" color="blue"><b>Integration Kit</b></font></caption></table>
                            <table width="40%" height="100" border='1' align="center">
                                <tr>
                                    <td>Parameter Name:</td><td>Parameter Value:</td>
                                </tr>
                                <tr>
                                    <td colspan="2"> Compulsory information</td>
                                </tr>
                                <tr>
                                    <td>TID	:</td><td><input type="text" name="tid" id="tid" readonly /></td>
                                </tr>
                                <tr>
                                    <td>Merchant Id	:</td><td><input type="text" name="merchant_id" value=""/></td>
                                </tr>
                                <tr>
                                    <td>Order Id	:</td><td><input type="text" name="order_id" value="123654789"/></td>
                                </tr>
                                <tr>
                                    <td>Amount	:</td><td><input type="text" name="amount" value="1.00"/></td>
                                </tr>
                                <tr>
                                    <td>Currency	:</td><td><input type="text" name="currency" value="INR"/></td>
                                </tr>
                                <tr>
                                    <td>Redirect URL	:</td><td><input type="text" name="redirect_url" value="http://localhost/Non_Seamless_kit/ccavResponseHandler.php"/></td>
                                </tr>
                                <tr>
                                    <td>Cancel URL	:</td><td><input type="text" name="cancel_url" value="http://localhost/Non_Seamless_kit/ccavResponseHandler.php"/></td>
                                </tr>
                                <tr>
                                    <td>Language	:</td><td><input type="text" name="language" value="EN"/></td>
                                </tr>
                                <tr>
                                    <td></td><td><INPUT TYPE="submit" value="CheckOut"></td>
                                </tr>
                            </table>
                        </form>
                       {{-- @include('services.mobiles')--}}
                        @include('services.dth')
                        @include('services.datacard')
                        @include('services.elictric')
                        @include('services.landline')
                        @include('services.broadband')
                        @include('services.gas')
                        @include('services.water')
                        @include('services.bus')
                        @include('services.recharge')
                        <div class="clearfix"></div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!--Plug-in Initialisation-->
    <bus-modal></bus-modal>
@endsection

@section('tab title')
    Plan
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {

            //Vertical Tab
            $('#parentVerticalTab').easyResponsiveTabs({
                type: 'vertical', //Types: default, vertical, accordion
                width: 'auto', //auto or any width like 600px
                fit: true, // 100% fit in a container
                closed: 'accordion', // Start closed if in accordion view
                tabidentify: 'hor_1', // The tab groups identifier
                activate: function(event) { // Callback function if tab is switched
                    var $tab = $(this);
                    var $info = $('#nested-tabInfo2');
                    var $name = $('span', $info);
                    $name.text($tab.text());
                    $info.show();
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $("#tab2").hide();
            $("#tab3").hide();
            $("#tab4").hide();
            $(".tabs-menu a").click(function(event){
                event.preventDefault();
                var tab=$(this).attr("href");
                $(".tab-grid").not(tab).css("display","none");
                $(tab).fadeIn("slow");
            });
        });
    </script>
    <script src="js/jquery-ui.js"></script>
    <script>
        $(function() {
            $( "#datepicker,#datepicker1" ).datepicker();
        });
    </script>
@endsection

@section('header-right')
    <div class=" header-right">
        <div class="banner">
            <s-banner></s-banner>
        </div>
    </div>
@endsection










