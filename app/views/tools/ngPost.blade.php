            <!-- Post que sirve para usar el ngInfiniteScroll con angular -->
            <div ng-app='myApp' ng-controller='DemoController'>
              <div infinite-scroll='reddit.nextPage()' infinite-scroll-disabled='reddit.busy' infinite-scroll-distance='3'>
                <div ng-repeat='item in reddit.items'>
                    <!-- Post -->
                    <div class="panel panel-default post ">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <p><a href=""><img src="../images/@{{item.user.avatar.name}}" class="post-avatar-indie" /></a> <a href="../@{{item.user.username}}" class="post-avatar-name">@{{item.user.full_name}}</a> - <a href="" class="post-date"></a></p>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <p class="post-content">@{{item.content}}</p>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <ul class="list-inline">
                                        <li><a class="font-icon share-icon" href="" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=http://icerlly.com/@{{item.user.username}}/post/@{{item.id}}','myWindow', 'status = 1, height = 420, width = 820, resizable = 0');"><i class="facebook icon"></i></a></li>
                                        <li><a class="font-icon share-icon" target="_blank" href="https://twitter.com/intent/tweet?url=http://icerlly.com/@{{item.user.username}}/post/@{{item.id}}&amp;via=icerlly&amp;text=Acabo de publicar en Icerlly:&utm_source=self&utm_medium=singlenav&utm_campaign=botontw"><i class="twitter icon"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Post -->
                </div>
                <div ng-show='reddit.busy'>Loading data...</div>
              </div>
            </div>