<div class="dashboard-manage-container">
    <div class="dashboard-manage-title-bar disable-copy">
        <span id='dm-title'>Manage Products</span>
    </div>
    <div class="dashboard-manage-show-bar disable-copy">
        <div class="dashboard-manage-show-bar-showfnc">
            <span>Show 
                <select name="" id="dm-select-show">
                    <option value="10">10</option>
                    <option value="20">20</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
                entries
            </span>
            <span id='dm-show-number'>( 10 - 20 of 100 results )</span>
        </div>
        <div class="dashboard-manage-show-bar-fnc">
            <a id='dm-add-btn'><i class="fas fa-plus-circle"></i> Add Permission</a>

            <!-- <div class="dashboard-manage-pop-up">
                <div class="dashboard-manage-pop-up-items">
                    <i class='fas fa-times dm-pop-up-close-btn'></i>
                    <div class="dashboard-manage-pop-up-info">
                        <span>Id Permission :
                            <input type="text" placeholder='Id permission'>
                        </span>
                        <span>Name Permission :
                            <input type="text" placeholder='Id permission'>
                        </span>
                        <span>Note Permission :
                            <input type="text" placeholder='Id permission'>
                        </span>
                        <div class="dm-pop-up-btn disable-copy">
                            <span class="dm-pop-up-save-btn">Add new permission</span>
                        </div>
                    </div>
                    <div class="dashboard-manage-pop-up-act">
                        <span>Set permission : </span>
                        <div class="dashboard-manage-pop-up-act-checkbox">
                            <span class="dm-pop-up-main"><input type="checkbox">Manage Accounts</span>
                            <span><input type="checkbox">Manage Customers</span>
                            <span><input type="checkbox">Manage Employees</span>
                            <span><input type="checkbox">Manage Permission</span>
                            <span><input type="checkbox">Analyst User</span>
                            <span class="dm-pop-up-main"><input type="checkbox">Manage Products</span>
                            <span><input type="checkbox">Manage Products</span>
                            <span><input type="checkbox">Analyst Products</span>
                            <span class="dm-pop-up-main"><input type="checkbox">Manage Revenue</span>
                            <span><input type="checkbox">Track Invoice</span>
                            <span><input type="checkbox">Analyst Profits</span>
                            <span class="dm-pop-up-main"><input type="checkbox">Manage Sales</span>
                            <span><input type="checkbox">Create Sales</span>
                            <span><input type="checkbox">Track Sales</span>
                            <span><input type="checkbox">Analyst Sales</span>
                            <span class="dm-pop-up-main"><input type="checkbox">Activity</span>
                            <span class="dm-pop-up-main"><input type="checkbox">Mail</span>
                            <span class="dm-pop-up-main"><input type="checkbox">Help</span>
                            <span class="dm-pop-up-main"><input type="checkbox">Log out</span>
                        </div>
                    </div>
                </div>
            </div> -->

            <i class="fas fa-file-export"></i>
        </div>
    </div>
    <div class="dashboard-manage-line"></div>
    <div class="dashboard-manage-search-bar disable-copy">
        <div class="dashboard-manage-search-bar-fnc">
            <span><i class="fas fa-filter"></i></span>
            <div class="dashboard-manage-search-bar-filter">
                <span>
                    Id:
                    <select name="" id="">
                        <option value="all">All</option>
                    </select>
                </span>
            </div>
            <div class="dashboard-manage-search-bar-filter">
                <span>
                    Name: 
                    <select name="" id="">
                        <option value="">All</option>
                    </select>
                </span>
            </div>
        </div>
        <div class="dashboard-manage-search-bar-fnc">
            <div class="dashboard-manage-search-bar-filter">
                <span>
                    <input type="text" placeholder='Search...'>as 
                    <select name="" id="" style='color:#8aa8f7'>
                        <option value="none">-</option>
                        <option value="id_quyen">Id</option>
                        <option value="ten_quyen">Name</option>
                    </select>
                </span>
            </div>
        </div>
    </div>
    <div class="dashboard-manage-line"></div>
    <div class="dashboard-manage-table">
        <table class="dashboard-manage-table-items">
            <!--Import-->
        </table>
        <div class="dashboard-manage-pop-up-container"></div>
        <div class="dashboard-manage-table-pagination disable-copy">
            <div class="dashboard-manage-table-pagination-items">
                <span id='dm-first-btn' class='dm-disable'><i class="fas fa-fast-backward"></i> First</span>
                <?php
                    $count = ceil(mysqli_fetch_array($conn->selectData('select count(*) as count from quyen'))['count']/10);
                    echo "<span class='dm-pagination-items dm-selected'>1</span>";
                    for ($i = 2; $i <= $count; $i ++) {
                        echo '<span class="dm-pagination-items">'.$i.'</span>';
                    }
                ?>
                <span id='dm-last-btn'>Last <i class="fas fa-fast-forward"></i></span>
            </div>
        </div>
    </div>

</div>
