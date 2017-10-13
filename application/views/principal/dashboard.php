<?php
echo $html_heading . $header;
?><?php //echo $breadcrumb; ?>
<main>
    <div class="main-content no-gutter">
        <section id="dashboard">
            <div class="row">
                <div class="col s12 m4">
                    <div id="boxSalesPerDay" class="panel panel-stats main lighten-1 white-text z-depth-1">
                        <div class="panel-header">
                            <div class="title">
                                Sales
                            </div>
                            <div class="subtitle">
                                <i class="material-icons">schedule</i> Latest 01 Jan, 08:00
                            </div>
                        </div>
                        <div class="panel-body">
                            <div id="chartSalesperDay" class="chart-wrapper"></div>
                        </div>
                        <div class="panel-footer valign-wrapper">
                            <div class="col s6 valign center-align bordered">
                                <div class="value">1422</div>
                                <div class="description">Monthly total</div>
                            </div>
                            <div class="col s6 valign center-align">
                                <div class="value">67</div>
                                <div class="description">Today total</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col s12 m4">
                    <div id="boxCustomersPerDay" class="panel panel-stats alternative lighten-1 white-text z-depth-1">
                        <div class="panel-header">
                            <div class="title">
                                Customers
                            </div>
                            <div class="subtitle">
                                <i class="material-icons">schedule</i> Latest 01 Jan, 08:00
                            </div>
                        </div>
                        <div class="panel-body">
                            <div id="chartCustomersPerDay" class="chart-wrapper"></div>
                        </div>
                        <div class="panel-footer valign-wrapper">
                            <div class="col s6 valign center-align bordered">
                                <div class="value">1356</div>
                                <div class="description">Monthly total</div>
                            </div>
                            <div class="col s6 valign center-align">
                                <div class="value">57</div>
                                <div class="description">Today total</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col s12 m4">
                    <div id="boxNewsletterSignups" class="panel panel-stats blue-grey lighten-1 white-text z-depth-1">
                        <div class="panel-header">
                            <div class="title">
                                Revenue
                            </div>
                            <div class="subtitle">
                                <i class="material-icons">schedule</i> Latest 01 Jan, 08:00
                            </div>
                        </div>
                        <div class="panel-body">
                            <div id="chartNewsletterSignups" class="chart-wrapper"></div>
                        </div>
                        <div class="panel-footer valign-wrapper">
                            <div class="col s6 valign center-align bordered">
                                <div class="value">1232.23</div>
                                <div class="description">Monthly total</div>
                            </div>
                            <div class="col s6 valign center-align">
                                <div class="value">42.65</div>
                                <div class="description">Today total</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">



                <div class="col s12 m6">
                    <div id="boxTotalSales" class="panel panel-bordered panel-dashboard panel-bar-chart z-depth-1">
                        <div class="panel-header">
                            <div class="title">
                                Total sales
                            </div>
                            <div class="subtitle">
                                Last 10 days
                            </div>
                        </div>
                        <div class="panel-body">
                            <div id="chartTotalSales" class="chart-wrapper"></div>
                        </div>
                    </div>
                </div>



                <div class="col s12 m6">
                    <div id="boxRecentOrders" class="panel panel-bordered panel-dashboard panel-table z-depth-1">
                        <div class="panel-header">
                            <div class="title">
                                Recent Orders
                            </div>
                            <div class="subtitle">
                                Overview of the last orders
                            </div>
                            <div class="actions">
                                <a class="dropdown-button btn-flat waves-effect" href="#" data-activates="recentOrdersActions">
                                    <i class="large material-icons">more_vert</i>
                                </a>
                                <ul id="recentOrdersActions" class="dropdown-content main-dropdown lighten-2">
                                    <li><a href="#!">one</a></li>
                                    <li><a href="#!">two</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#!">three</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="panel-body">
                            <table class="table highlight">
                                <thead>
                                    <tr>
                                        <th class="center-align">
                                            <input type="checkbox" id="checkAllOrders" class="checkToggle" data-target="#boxRecentOrders table tbody [type=checkbox]">
                                            <label for="checkAllOrders"></label>
                                        </th>
                                        <th>Name</th>
                                        <th class="hide-on-small-only">Item Name</th>
                                        <th>Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="center-align">
                                            <input type="checkbox" name="chandler" id="chandler">
                                            <label for="chandler"></label>
                                        </td>
                                        <td>Chandler</td>
                                        <td class="hide-on-small-only">Peanuts</td>
                                        <td>$3.76</td>
                                    </tr>
                                    <tr>
                                        <td class="center-align">
                                            <input type="checkbox" name="joey" id="joey">
                                            <label for="joey"></label>
                                        </td>
                                        <td>Joey</td>
                                        <td class="hide-on-small-only">Beans</td>
                                        <td>$0.97</td>
                                    </tr>
                                    <tr>
                                        <td class="center-align">
                                            <input type="checkbox" name="ross" id="ross">
                                            <label for="ross"></label>
                                        </td>
                                        <td>Ross</td>
                                        <td class="hide-on-small-only">Rice</td>
                                        <td>$2.13</td>
                                    </tr>
                                    <tr>
                                        <td class="center-align">
                                            <input type="checkbox" name="rachel" id="rachel">
                                            <label for="rachel"></label>
                                        </td>
                                        <td>Rachel</td>
                                        <td class="hide-on-small-only">Butter</td>
                                        <td>$1.54</td>
                                    </tr>
                                    <tr>
                                        <td class="center-align">
                                            <input type="checkbox" name="monica" id="monica">
                                            <label for="monica"></label>
                                        </td>
                                        <td>Monica</td>
                                        <td class="hide-on-small-only">Chicken</td>
                                        <td>$7.00</td>
                                    </tr>
                                    <tr>
                                        <td class="center-align">
                                            <input type="checkbox" name="phoebe" id="phoebe">
                                            <label for="phoebe"></label>
                                        </td>
                                        <td>Phoebe</td>
                                        <td class="hide-on-small-only">Pie</td>
                                        <td>$3.27</td>
                                    </tr>
                                    <tr>
                                        <td class="center-align">
                                            <input type="checkbox" name="janice" id="janice">
                                            <label for="janice"></label>
                                        </td>
                                        <td>Janice</td>
                                        <td class="hide-on-small-only">Cornflakes</td>
                                        <td>$0.87</td>
                                    </tr>
                                    <tr>
                                        <td class="center-align">
                                            <input type="checkbox" name="richard" id="richard">
                                            <label for="richard"></label>
                                        </td>
                                        <td>Richard</td>
                                        <td class="hide-on-small-only">Coke</td>
                                        <td>$2.21</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">



                <div class="col s12 l5">
                    <div id="boxChat" class="panel panel-bordered panel-dashboard panel-chat z-depth-1">
                        <div class="panel-header">
                            <div class="title">
                                Chat
                            </div>
                            <div class="subtitle">
                                Incoming messages
                            </div>
                        </div>
                        <form>
                            <div class="panel-body">
                                <div class="slimscroll" data-height="230px" data-start="bottom">
                                    <div class="messages-wrapper">
                                        <div class="row message sent">
                                            <div class="col s12">
                                                <img src="img/person-1.jpg" alt="John Doe" class="circle responsive-img left-align">
                                                <div class="text">
                                                    <div class="name">John Doe</div>
                                                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row message received">
                                            <div class="col s12">
                                                <img src="img/person-2.jpg" alt="Jane Doe" class="circle responsive-img right-align">
                                                <div class="text">
                                                    <div class="name">Jane Doe</div>
                                                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row message received">
                                            <div class="col s12">
                                                <img src="img/person-2.jpg" alt="Jane Doe" class="circle responsive-img right-align">
                                                <div class="text">
                                                    <div class="name">Jane Doe</div>
                                                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row message sent">
                                            <div class="col s12">
                                                <img src="img/person-1.jpg" alt="John Doe" class="circle responsive-img left-align">
                                                <div class="text">
                                                    <div class="name">John Doe</div>
                                                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-footer">
                                <div class="row">
                                    <div class="col s12">
                                        <input type="text" placeholder="Type a message and hit 'enter' to send">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>



                <div class="col s12 l7">
                    <div id="boxTodoList" class="panel panel-bordered panel-dashboard panel-todo z-depth-1">
                        <div class="panel-header">
                            <div class="row no-gutter">
                                <div class="col s12 m6">
                                    <div class="title">Todo list</div>
                                    <div class="subtitle">Tasks summary</div>
                                </div>
                                <div class="col s12 m6">
                                    <form>
                                        <div class="input-field">
                                            <input type="text" name="search" id="search" required="" placeholder="Search">
                                            <label for="search" class="active"></label>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <form>
                            <div class="panel-body">
                                <div class="slimscroll" data-height="230px">
                                    <div class="tasks-wrapper">
                                        <p>
                                            <input type="checkbox" name="task-lunch" id="task-lunch" checked>
                                            <label for="task-lunch">Have lunch</label>
                                        </p>
                                        <p>
                                            <input type="checkbox" name="task-drink" id="task-drink" checked>
                                            <label for="task-drink">Work</label>
                                        </p>
                                        <p>
                                            <input type="checkbox" name="task-watch-series" id="task-watch-series">
                                            <label for="task-watch-series">Watch series</label>
                                        </p>
                                        <p>
                                            <input type="checkbox" name="task-play-videogame" id="task-play-videogame">
                                            <label for="task-play-videogame">Play videogame</label>
                                        </p>
                                        <p>
                                            <input type="checkbox" name="task-run" id="task-run">
                                            <label for="task-run">Brush teeth</label>
                                        </p>
                                        <p>
                                            <input type="checkbox" name="task-to-sleep" id="task-to-sleep">
                                            <label for="task-to-sleep">Sleep</label>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-footer">
                                <div class="row">
                                    <div class="col s12">
                                        <input type="text" placeholder="Type the description and hit 'enter' to add">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">



                <div class="col s12 l6">
                    <div id="boxServerStats" class="panel panel-bordered panel-dashboard panel-gauge-chart z-depth-1">
                        <div class="panel-header">
                            <div class="title">
                                Server stats
                            </div>
                            <div class="subtitle">
                                Refreshing in 3 seconds...
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col m4 s12">
                                    <div id="chartServerCpu" class="chart-wrapper" data-title="CPU usage (%)"></div>
                                </div>
                                <div class="col m4 s12">
                                    <div id="chartServerMemory" class="chart-wrapper" data-title="Memory usage (%)"></div>
                                </div>
                                <div class="col m4 s12">
                                    <div id="chartServerHd" class="chart-wrapper" data-title="HD  usage (%)"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="col s12 l3">
                    <div class="card-panel card-dashboard facebook waves-effect waves-lighten-5">
                        <div class="post">
                            I am a very simple card. I am good at containing small bits of information.
                            I am convenient because I require little markup to use effectively. I am similar to what is called a panel in other frameworks.
                        </div>
                        <div class="date">
                            15 March, 2016
                        </div>
                        <div class="row">
                            <div class="col s4 brand">
                                <i class="fa fa-facebook"></i>
                            </div>
                            <div class="col s8 trending">
                                <i class="fa fa-thumbs-o-up"></i> 1467
                                <i class="fa fa-comment-o"></i> 127
                            </div>
                        </div>
                    </div>
                    <div class="card-panel card-dashboard twitter waves-effect waves-lighten-5 margin-top-15">
                        <div class="post">
                            I am a very simple card. I am good at containing small bits of information.
                            I am convenient because I require little markup to use effectively. I am similar to what is called a panel in other frameworks.
                        </div>
                        <div class="date">
                            15 March, 2016
                        </div>
                        <div class="row">
                            <div class="col s4 brand">
                                <i class="fa fa-twitter"></i>
                            </div>
                            <div class="col s8 trending">
                                <i class="fa fa-star-o"></i> 1192
                                <i class="fa fa-retweet"></i> 86
                            </div>
                        </div>
                    </div>
                </div>



                <div class="col s12 l3">
                    <div class="card card-dashboard">
                        <div class="card-image waves-effect waves-block waves-light">
                            <img class="activator" src="img/blog-cover.jpg">
                        </div>
                        <div class="card-content">
                            <span class="card-title activator">
                                Our Blog
                                <i class="material-icons waves-effect right">more_vert</i>
                            </span>
                            <p class="right-align">
                                <a class="btn-flat waves-effect" href="#">Go for it</a>
                            </p>
                        </div>
                        <div class="card-reveal">
                            <span class="card-title">
                                Our Blog
                                <i class="material-icons waves-effect right">close</i>
                            </span>
                            <p>Here is some more information about blog that is only revealed once clicked on.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main>
<?php echo $footer; ?>
<script src="<?php echo SchoolSiteResourcesURL;?>bower_components/amcharts3/amcharts/amcharts.js" type="text/javascript"></script>
<script src="<?php echo SchoolSiteResourcesURL;?>bower_components/amcharts3/amcharts/serial.js" type="text/javascript"></script>
<script src="<?php echo SchoolSiteResourcesURL;?>bower_components/amcharts3/amcharts/gauge.js" type="text/javascript"></script>
<script src="<?php echo SchoolSiteResourcesURL;?>bower_components/amcharts3/amcharts/themes/light.js" type="text/javascript"></script>
<script src="<?php echo SchoolSiteResourcesURL;?>bower_components/slimscroll/jquery.slimscroll.js" type="text/javascript"></script>
<script src="<?php echo SchoolSiteJSURL;?>pages/dashboard.js" type="text/javascript"></script>
