<?php require_once("header.php"); ?>
<form action="order.php" method="post">
    <div class="signupMainContainer clearfix">
        <div class="safeArea ">


            <?php require_once("config.php");

            if (isset($_COOKIE["PHPLGADP"])) {
                $authToken = $_COOKIE["PHPLGADP"];
                $selectUsr = "SELECT * FROM users WHERE usrauthToken='$authToken'";
                $runselectUsr = mysqli_query($conn, $selectUsr);

                while ($usriddata = mysqli_fetch_array($runselectUsr)) {
                    $user_id = $usriddata["user_id"];
                }
                global $user_id;
            }

            $priceCheck = $_REQUEST['price'];
            $prices = array_sum($priceCheck);

    
            $ordersQ = "SELECT * FROM users WHERE user_id='$user_id'";
            $orderQuery = mysqli_query($conn, $ordersQ);
            if ($orderQuery == true) {
                while ($orders = mysqli_fetch_array($orderQuery)) { ?>
                    <div class="col-sm-8 d-inline-block bangla-font">
                        <div class="col-sm-6  d-inline-block">
                            <div class="emailAddress">
                                <p>Address *</p><input type="text" name="addr" placeholder="ঠিকানা" value="<?php echo $orders['addr1']; ?>" required>
                            </div>
                            <div class="emailAddress">
                                <p>Mobile Number *</p><input type="text" name="MobileNumber" placeholder="01*********" maxlength="11" value="<?php echo $orders['mobile']; ?>" required>
                            </div>
                            <div class="Gender" style="width: 100% !important;">
                                <p>Transport *</p><select name="transport" class="bangla-font">
                                    <option value="সুন্দরবন কুরিয়ার সার্ভিস" selected>সুন্দরবন কুরিয়ার সার্ভিস</option>
                                    <option value="জননী">জননী</option>
                                    <option value="এস এ পরিবহন">এস এ পরিবহন</option>
                                    <option value="ওমেক্স">ওমেক্স</option>
                                    <option value="কন্টিনেন্টাল">কন্টিনেন্টাল</option>
                                </select>
                            </div>

                        </div>
                        <div class="col-sm-6 pull-right d-inline-block">
                            <div class="emailAddress ">
                                <p>Region *</p><input type="text" name="Region" placeholder="বিভাগ" value="<?php echo $orders['Region']; ?>" required>
                            </div>
                            <div class="emailAddress">
                                <p>City *</p><input type="text" name="City" placeholder="জেলা" value="<?php echo $orders['City']; ?>" required>
                            </div>
                            <div class="emailAddress">
                                <p>Area *</p><input type="text" name="Area" placeholder="থানা" value="<?php echo $orders['Area']; ?>" required>
                            </div>

                        </div>
                        <hr>
                        <div class="col-sm-12">
                            <div class="emailAddress col-sm-6 d-inline-block">
                                <label for="cashSelect"><input class="d-inline-block w-auto" id="cashSelect" type="radio" name="paymentMethod" id="" value="Cash On Delivary" onclick="conDisplay();" checked> Cash On Delivary</label>
                            </div>
                            <div class="emailAddress col-sm-6 d-inline-block">
                                <label for="bkashSelect"><input class="d-inline-block w-auto" id="bkashSelect" type="radio" name="paymentMethod" id="" value="bkash" onclick="conDisplay();"> bKash</label>
                            </div>
                            <!-- <div class="emailAddress col-sm-6 d-inline-block">
                                <label for="rocketSelect"><input class="d-inline-block w-auto" id="rocketSelect" type="radio" name="paymentMethod" id="" value="rocket" onclick="conDisplay();"> Rocket</label>
                            </div> -->

                            <div class="bkash bg-bkash w-100 p-3 rounded" id="bkashCon" style="display: none;">
                                <p class="text-light">Send Money To: 01915 71 11 72 (personal)</p>
                                <div class="emailAddress col-sm-5 d-inline-block">
                                    <p>bKash Number *</p><input type="text" name="bkashNumber" placeholder="bKash Number" value="" maxlength="11" minlength="11" id="bkashNumber">
                                </div>
                                <div class="emailAddress col-sm-6 d-inline-block">
                                    <p>bKash Transaction Id *</p><input type="text" name="trxid" placeholder="bKash Transaction Id" value="" id="trxid">
                                </div>
                            </div>
                            <!-- <div class="bkash bg-rocket my-2 w-100 rounded" id="rocketCon" style="display: none;">
                                <div class="emailAddress col-sm-5 d-inline-block">
                                    <p class="text-light">Send Money To: 01849945080</p>
                                    <p>Rocket Number *</p><input type="text" name="RocketNumber" placeholder="Rocket Number" value="" maxlength="11" minlength="11" id="RocketNumber">
                                </div>
                                <div class="emailAddress col-sm-6 d-inline-block">
                                    <p>Rocket Transaction Id *</p><input type="text" name="Rockettrxid" placeholder="Rocket Transaction Id" value="" id="Rockettrxid">
                                </div> -->
                        </div>
                    </div>



                    <div class="col-sm-3 pull-right d-inline-block">
                        <div class="carttotaldetils">
                            <h4>Checkout Summary</h4>
                            <table class="table">
                            
                                <!-- <tr>
                                <td>Gift Wrap</td>
                                <td style="text-align: right">20 Tk.</td>
                            </tr> -->
                                <!-- <tr>
                                                <td>Shipping</td>
                                                <td style="text-align: right"><?php echo $_REQUEST["Shipping"]; ?>
                                                    Tk.
                                                </td>
                                            </tr> -->
                                <tr>
                                    <td>Total</td>
                                    <td style="text-align: right"><?php echo $prices; ?> Tk.</td>
                                </tr>
                                <tr>
                                    <td>courier Charge</td>
                                    <td style="text-align: right"><?php echo $bkashvat = 30/*$_REQUEST["Total"] * 0.02;*/ ?> Tk.</td>
                                </tr>
                                <tr>
                                    <td>Payable Total</td>
                                    <td style="text-align: right"><?php echo $prices + $bkashvat; ?> Tk. <input type="hidden" name="patableTotal" value="<?php echo $_REQUEST['Total'] + $bkashvat; ?>"></td>
                                </tr>
                            </table>
                            <hr>

                            <button type="submit" class="btn bg-adp" style="width: 100%;">Place Order</button>
                        </div>
                    </div>
        </div>

<?php }
            } ?>


    </div>

    </div>
    </div>
</form>
<script>
    var cashSelect = document.getElementById("cashSelect");
    var bkashSelect = document.getElementById("bkashSelect");
    var rocketSelect = document.getElementById("rocketSelect");




    var bkashCon = document.getElementById("bkashCon");
    var rocketCon = document.getElementById("rocketCon");

    function conDisplay() {
        if (cashSelect.checked) {
            cashSelect.required;
        } else {

        }
        if (bkashSelect.checked) {
            var bkashNumber = document.getElementById("bkashNumber");
            var trxid = document.getElementById("trxid");

            bkashCon.style.display = "block";

        } else {
            bkashCon.style.display = "none";
        }
        if (rocketSelect.checked) {
            var RocketNumber = document.getElementById("RocketNumber");
            var Rockettrxid = document.getElementById("Rockettrxid");

            rocketCon.style.display = "block";
        } else {
            rocketCon.style.display = "none";
        }
    }
</script>
<div class="clearboth"></div>
<?php require_once("footer.php"); ?>