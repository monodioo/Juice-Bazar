<div class="page-section card col-8 p-3 px-5">
    <div class="section-title">Sales results</div>
    <div>
        <form class="report-form">
            <div class="form-group form-inline">
                <label for="inputMonthReport">Month</label>
                <select class="mx-2 form-control month-select" id="inputMonthReport">
                    <option value="0" selected>Entire Year</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                </select>
                <label for="inputYearReport">Year</label>
                <select class="mx-2 form-control year-select" id="inputYearReport">
                    <option value="2018">2018</option>
                    <option value="2019" selected>2019</option>
                    <option value="2020">2020</option>
                    <option value="2021">2021</option>
                </select>
                <label for="totalRevenue" class="ml-4">Total Revenue</label>
                <div class="mx-2 font-weight-bold total-revenue" id="totalRevenue">

                </div>
        </form>
    </div>
    <div>
        <table class="table table-sm table-striped table-hover text-center">
            <thead>
                <tr>

                    <th scope="col" class="timeCol">Day/Month/Year</th>
                    <th scope="col">No. Successful Orders</th>
                    <th scope="col">Revenue</th>
                </tr>
            </thead>
            <tbody class="table-body">

            </tbody>
        </table>
    </div>
</div>