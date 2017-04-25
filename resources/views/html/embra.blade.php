@extends('layouts.main')
@section('content')
<div class="content-wrapper-inner">
    <div class="content-wrapper-settings">
        <ul class="nav nav-tabs">
            <li class="active"><a href="account_settings.html"><span>Photos</span><div class="profile-warning"></div></a></li>
            <li class="active"><a href="reset_password.html"><span>Profile</span><div class="profile-warning"></div></a></li>
            <li class="active"><a href="profile_settings.html"><span>Match</span><div class="profile-tick"></div></a></li>
            <li class="active"><a href="billing.html"><span>Interest</span><div class="profile-warning"></div></a></li>
            <li class="active"><a href="notification.html"><span>Personality</span><div class="profile-warning"></div></a></li>
            <li class="active"><a href="notification.html"><span>CupidTags</span><div class="profile-warning"></div></a></li>
            <li class="active"><a href="notification.html"><span>Verify Profile</span><div class="profile-warning"></div></a></li>
            <li class="active"><a href="notification.html"><span>IMBRA</span><div class="profile-tick"></div></a></li>
        </ul>
        <div id="profile-bar">
            <div id="profilecompletionbar">

                <div id="profilecompletionlevel" style="width: 43%;"><p class="profilebartext">43% Complete</p></div>

            </div>
            <a href="#" id="profileCompletionExpand" class="right">What's next? <span id="toggleArrow" data-up="+" data-down="-">+</span></a>

        </div>
        <div class="roundedContainer">
    <div class="imbra">
        <div class="address-update-container">
            <div class="address-update-inner">
                <div>
                    <h1>International Marriage Broker Regulation Act (IMBRA)</h1>
                </div>


            </div>
            <div class="address-update-outer">
                <p>To help protect the safety of our members, we now request members to complete the International Marriage Brokers Act (IMBRA) safety information form.</p> 
                <p>For more information on IMBRA please read our FAQ or visit the <strong><u>IMBRA Wikipedia</u></strong> page</p>
            </div>
            <div class="upgrade-info">
                <div class="form-group">
                    <div class="updateconf">
                        <p><strong>IMPORTANT:</strong> if you apply for a USA K non-immigrant visa for your foreign partner then as part of the visa assessment process you may be asked to demonstrate that this background information was provided to your partner.</p>

                    </div>

                </div>
            </div>
        </div>
        <div class="your-information">
            <div class="your-information-heading"><h1>Your Information</h1><span class='your-information-heading-right'>Your name and date of birth will not be shared</span><span class='your-information-heading-image'><img src='../image/info.png' width='15px' height='15px'/></span></div>
            <div class='your-info'>
                <div class='your-info-row1'>
                    <div class='your-info-col1'>
                        <label>First Name:</label>
                        <input type="text" name="firstName" value="Shadan" autocomplete="off">
                    </div>
                    <div class='your-info-col2'>
                        <label>Last Name:</label>
                        <input type="text" name="lastName" value=".Khan" autocomplete="off">
                    </div>
                </div>
                <div class='your-info-row2'>
                    <div class='your-info-col3'>
                        <label>Middle Initial:</label>
                        <select name="middleInitial" class="combo">
                            <option value="" selected=""></option>

                            <option value="A">A</option>

                            <option value="B">B</option>


                        </select>
                    </div>
                    <div class='your-info-col4'>
                        <label>Date of Birth:</label>
                        <select name="dob_m" id="dob_m" class="dob">
                            <option value=""></option>
                            <option value="1" selected="">January</option>
                            <option value="2">February</option>
                            <option value="3">March</option>
                            <option value="4">April</option>
                            <option value="5">May</option>
                            <option value="6">June</option>
                            <option value="7">July</option>
                            <option value="8">August</option>
                            <option value="9">September</option>
                            <option value="10">October</option>
                            <option value="11">November</option>
                            <option value="12">December</option>
                        </select>
                        <select name="dob_d" id="dob_d" class="dob">
                            <option value=""></option>

                            <option value="1">1</option>

                            <option value="2">2</option>

                            <option value="3">3</option>

                            <option value="4">4</option>

                            <option value="5">5</option>

                            <option value="6">6</option>

                            <option value="7">7</option>

                            <option value="8">8</option>

                            <option value="9" selected="">9</option>

                            <option value="10">10</option>

                            <option value="11">11</option>

                            <option value="12">12</option>

                            <option value="13">13</option>

                            <option value="14">14</option>

                            <option value="15">15</option>

                            <option value="16">16</option>

                            <option value="17">17</option>

                            <option value="18">18</option>

                            <option value="19">19</option>

                            <option value="20">20</option>

                            <option value="21">21</option>

                            <option value="22">22</option>

                            <option value="23">23</option>

                            <option value="24">24</option>

                            <option value="25">25</option>

                            <option value="26">26</option>

                            <option value="27">27</option>

                            <option value="28">28</option>

                            <option value="29">29</option>

                            <option value="30">30</option>

                            <option value="31">31</option>

                        </select>
                        <select name="dob_y" id="dob_y" class="dob">
                            <option value=""></option>

                            <option value="2017">2017</option>

                            <option value="2016">2016</option>

                            <option value="2015">2015</option>

                            <option value="2014">2014</option>

                            <option value="2013">2013</option>

                            <option value="2012">2012</option>

                            <option value="2011">2011</option>

                            <option value="2010">2010</option>

                            <option value="2009">2009</option>

                            <option value="2008">2008</option>

                            <option value="2007">2007</option>

                            <option value="2006">2006</option>

                            <option value="2005">2005</option>

                            <option value="2004">2004</option>

                            <option value="2003">2003</option>

                            <option value="2002">2002</option>

                            <option value="2001">2001</option>

                            <option value="2000">2000</option>

                            <option value="1999">1999</option>

                            <option value="1998">1998</option>

                            <option value="1997">1997</option>

                            <option value="1996">1996</option>

                            <option value="1995">1995</option>

                            <option value="1994">1994</option>

                            <option value="1993">1993</option>

                            <option value="1992">1992</option>

                            <option value="1991">1991</option>

                            <option value="1990">1990</option>

                            <option value="1989">1989</option>

                            <option value="1988" selected="selected">1988</option>

                            <option value="1987">1987</option>

                            <option value="1986">1986</option>

                            <option value="1985">1985</option>

                            <option value="1984">1984</option>

                            <option value="1983">1983</option>

                            <option value="1982">1982</option>

                            <option value="1981">1981</option>

                            <option value="1980">1980</option>

                            <option value="1979">1979</option>

                            <option value="1978">1978</option>

                            <option value="1977">1977</option>

                            <option value="1976">1976</option>

                            <option value="1975">1975</option>

                            <option value="1974">1974</option>

                            <option value="1973">1973</option>

                            <option value="1972">1972</option>

                            <option value="1971">1971</option>

                            <option value="1970">1970</option>

                            <option value="1969">1969</option>

                            <option value="1968">1968</option>

                            <option value="1967">1967</option>

                            <option value="1966">1966</option>

                            <option value="1965">1965</option>

                            <option value="1964">1964</option>

                            <option value="1963">1963</option>

                            <option value="1962">1962</option>

                            <option value="1961">1961</option>

                            <option value="1960">1960</option>

                            <option value="1959">1959</option>

                            <option value="1958">1958</option>

                            <option value="1957">1957</option>

                            <option value="1956">1956</option>

                            <option value="1955">1955</option>

                            <option value="1954">1954</option>

                            <option value="1953">1953</option>

                            <option value="1952">1952</option>

                            <option value="1951">1951</option>

                            <option value="1950">1950</option>

                            <option value="1949">1949</option>

                            <option value="1948">1948</option>

                            <option value="1947">1947</option>

                            <option value="1946">1946</option>

                            <option value="1945">1945</option>

                            <option value="1944">1944</option>

                            <option value="1943">1943</option>

                            <option value="1942">1942</option>

                            <option value="1941">1941</option>

                            <option value="1940">1940</option>

                            <option value="1939">1939</option>

                            <option value="1938">1938</option>

                            <option value="1937">1937</option>

                            <option value="1936">1936</option>

                            <option value="1935">1935</option>

                            <option value="1934">1934</option>

                            <option value="1933">1933</option>

                            <option value="1932">1932</option>

                            <option value="1931">1931</option>

                            <option value="1930">1930</option>

                            <option value="1929">1929</option>

                            <option value="1928">1928</option>

                            <option value="1927">1927</option>

                            <option value="1926">1926</option>

                            <option value="1925">1925</option>

                            <option value="1924">1924</option>

                            <option value="1923">1923</option>

                            <option value="1922">1922</option>

                            <option value="1921">1921</option>

                            <option value="1920">1920</option>

                            <option value="1919">1919</option>

                            <option value="1918">1918</option>

                        </select>

                    </div>

                </div>
            </div>
        </div>
        <div class="criminal-history">
            <div class="criminal-history-heading"><h1>Criminal History</h1></div>
            <ul class='criminal-listing-ul'>
                <li class="imbraText">
                    Do you have any court order restricting your physical or other contact with, behavior towards, or communication with another person, including any temporary or permanent civil restraining order or protection order?
                </li>
                <li id="courtOrder" class="imbraText">
                    <input type="radio" id="courtOrderYes" name="courtOrder" value="1"> <label for="courtOrderYes">Yes</label>
                    <input type="radio" id="courtOrderNo" name="courtOrder" value="2" checked=""> <label for="courtOrderNo">No</label>
                    <span class="radioRequiredMsg"></span>
                </li>
                <li class="imbraText">Have you ever been arrested or convicted by any Federal, State, or local authority for any of the following (leave all boxes blank if none apply):</li>
                <li class="imbraText">
                    <input type="checkbox" id="prostitutionRef_26" name="prostitutionRef" value="26"><label for="prostitutionRef_26" style="cursor:hand">solely, principally, or incidentally engaging in prostitution </label>
                </li>
                <li class="imbraText">
                    <input type="checkbox" id="prostitutionRef_27" name="prostitutionRef" value="27"><label for="prostitutionRef_27" style="cursor:hand">a direct or indirect attempt to procure prostitutes or persons for the purpose of prostitution </label>
                </li>
                <li class="imbraText">
                    <input type="checkbox" id="prostitutionRef_28" name="prostitutionRef" value="28"><label for="prostitutionRef_28" style="cursor:hand">receiving, in whole or in part, of the proceeds of prostitution </label>
                </li>
                <li class="imbraText">Have you ever been arrested or convicted by any Federal, State, or local authority for any offenses related to controlled substances or alcohol?</li>      
                <li id="drugsAlcohol" class="imbraText">
                    <input type="radio" id="drugsAlcoholYes" name="drugsAlcohol" value="1"> <label for="drugsAlcoholYes">Yes</label>
                    <input type="radio" id="drugsAlcoholNo" name="drugsAlcohol" value="2" checked=""> <label for="drugsAlcoholNo">No</label>
                    <span class="radioRequiredMsg">Required</span>
                </li>
                <li class="imbraText">Please indicate with a check in the appropriate box if you have ever been arrested or convicted of any of the following (leave all boxes blank if none apply):</li>
                <ul class="criminalhistory left">

                    <li class="imbraText">
                        <input type="checkbox" id="criminal_3" name="criminalHistory" value="3"><label for="criminal_3" style="cursor:hand">Homicide</label>
                    </li>

                    <li class="imbraText">
                        <input type="checkbox" id="criminal_4" name="criminalHistory" value="4"><label for="criminal_4" style="cursor:hand">Murder</label>
                    </li>

                    <li class="imbraText">
                        <input type="checkbox" id="criminal_5" name="criminalHistory" value="5"><label for="criminal_5" style="cursor:hand">Abusive Sexual Contact </label>
                    </li>

                    <li class="imbraText">
                        <input type="checkbox" id="criminal_6" name="criminalHistory" value="6"><label for="criminal_6" style="cursor:hand">Manslaughter</label>
                    </li>

                    <li class="imbraText">
                        <input type="checkbox" id="criminal_7" name="criminalHistory" value="7"><label for="criminal_7" style="cursor:hand">Battery</label>
                    </li>

                    <li class="imbraText">
                        <input type="checkbox" id="criminal_8" name="criminalHistory" value="8"><label for="criminal_8" style="cursor:hand">Unlawful Criminal Restraint</label>
                    </li>

                    <li class="imbraText">
                        <input type="checkbox" id="criminal_9" name="criminalHistory" value="9"><label for="criminal_9" style="cursor:hand">Rape</label>
                    </li>

                    <li class="imbraText">
                        <input type="checkbox" id="criminal_10" name="criminalHistory" value="10"><label for="criminal_10" style="cursor:hand">Assault</label>
                    </li>

                </ul>
                <ul class="criminalhistory left">

                    <li class="imbraText">
                        <input type="checkbox" id="criminal_11" name="criminalHistory" value="11"><label for="criminal_11" style="cursor:hand">Domestic Violence </label>
                    </li>

                    <li class="imbraText">
                        <input type="checkbox" id="criminal_12" name="criminalHistory" value="12"><label for="criminal_12" style="cursor:hand">Peonage</label>
                    </li>

                    <li class="imbraText">
                        <input type="checkbox" id="criminal_13" name="criminalHistory" value="13"><label for="criminal_13" style="cursor:hand">Incest</label>
                    </li>

                    <li class="imbraText">
                        <input type="checkbox" id="criminal_14" name="criminalHistory" value="14"><label for="criminal_14" style="cursor:hand">Child Abuse or Neglect </label>
                    </li>

                    <li class="imbraText">
                        <input type="checkbox" id="criminal_15" name="criminalHistory" value="15"><label for="criminal_15" style="cursor:hand">Torture</label>
                    </li>

                    <li class="imbraText">
                        <input type="checkbox" id="criminal_16" name="criminalHistory" value="16"><label for="criminal_16" style="cursor:hand">Trafficking</label>
                    </li>

                    <li class="imbraText">
                        <input type="checkbox" id="criminal_17" name="criminalHistory" value="17"><label for="criminal_17" style="cursor:hand">Sexual Exploitation </label>
                    </li>

                    <li class="imbraText">
                        <input type="checkbox" id="criminal_18" name="criminalHistory" value="18"><label for="criminal_18" style="cursor:hand">Abduction</label>
                    </li>

                </ul>
                <ul class="criminalhistory left">

                    <li class="imbraText">
                        <input type="checkbox" id="criminal_19" name="criminalHistory" value="19"><label for="criminal_19" style="cursor:hand">False Imprisonment </label>
                    </li>

                    <li class="imbraText">
                        <input type="checkbox" id="criminal_20" name="criminalHistory" value="20"><label for="criminal_20" style="cursor:hand">Holding Hostage </label>
                    </li>

                    <li class="imbraText">
                        <input type="checkbox" id="criminal_21" name="criminalHistory" value="21"><label for="criminal_21" style="cursor:hand">Stalking</label>
                    </li>

                    <li class="imbraText">
                        <input type="checkbox" id="criminal_22" name="criminalHistory" value="22"><label for="criminal_22" style="cursor:hand">Kidnapping</label>
                    </li>

                    <li class="imbraText">
                        <input type="checkbox" id="criminal_23" name="criminalHistory" value="23"><label for="criminal_23" style="cursor:hand">Sexual Assault </label>
                    </li>

                    <li class="imbraText">
                        <input type="checkbox" id="criminal_24" name="criminalHistory" value="24"><label for="criminal_24" style="cursor:hand">Slave Trade </label>
                    </li>

                    <li class="imbraText">
                        <input type="checkbox" id="criminal_25" name="criminalHistory" value="25"><label for="criminal_25" style="cursor:hand">Involuntary Servitude </label>
                    </li>

                </ul>
            </ul>
            <div class="clearfix"></div>

            <ul class='martial-status'>
                <li class="sectionHeading clearfix imbraTopline"><h1>Marital Status and Dependents</h1></li>
                <li id="currentlyMarried" class="imbraText">
                    <span class="maritalStatus left">Are you currently married?</span>
                    <span class="labelyesno">
                        <input type="radio" id="currentlyMarriedYes" name="currentlyMarried" value="1">
                        <label for="currentlyMarriedYes">Yes</label>
                        <input type="radio" id="currentlyMarriedNo" name="currentlyMarried" value="2" checked="">
                        <label for="currentlyMarriedNo">No</label>
                    </span>

                </li>
                <li id="previouslyMarried" class="imbraText">
                    <span class="maritalStatus left">Were you previously married?</span>
                    <span class="labelyesno">
                        <input type="radio" id="priviouslyMarriedYes" name="previouslyMarried" value="1">
                        <label for="priviouslyMarriedYes">Yes</label>
                        <input type="radio" id="priviouslyMarriedNo" name="previouslyMarried" value="2" checked="">
                        <label for="priviouslyMarriedNo">No</label>

                    </span>
                </li>
                <span id="marriageDetails" class="imbraText" style="display:none">
                    <li class="imbraText" style="padding:0 0 10px 25px">
                        <table id="marriageHistory" style="display:none" class="marriageHistory">
                            <tbody><tr id="marriageHistoryHeader">
                                    <th>Termination Date</th>
                                    <th>Termination Cause</th>
                                    <th></th>
                                </tr>

                            </tbody></table>
                    </li>
                    <li class="imbraText">
                        When did the marriage end?

                        <select id="mar_m" name="mar_m" class="mDate">
                            <option value="0" selected="">Month</option>
                            <option value="1">January</option>
                            <option value="2">February</option>
                            <option value="3">March</option>
                            <option value="4">April</option>
                            <option value="5">May</option>
                            <option value="6">June</option>
                            <option value="7">July</option>
                            <option value="8">August</option>
                            <option value="9">September</option>
                            <option value="10">October</option>
                            <option value="11">November</option>
                            <option value="12">December</option>
                        </select>
                        <select id="mar_d" name="mar_d" class="mDate">
                            <option value="0" selected="">Day</option>

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

                            <option value="13">13</option>

                            <option value="14">14</option>

                            <option value="15">15</option>

                            <option value="16">16</option>

                            <option value="17">17</option>

                            <option value="18">18</option>

                            <option value="19">19</option>

                            <option value="20">20</option>

                            <option value="21">21</option>

                            <option value="22">22</option>

                            <option value="23">23</option>

                            <option value="24">24</option>

                            <option value="25">25</option>

                            <option value="26">26</option>

                            <option value="27">27</option>

                            <option value="28">28</option>

                            <option value="29">29</option>

                            <option value="30">30</option>

                            <option value="31">31</option>

                        </select>
                        <select id="mar_y" name="mar_y" class="mDate">
                            <option value="0" selected="">Year</option>

                            <option value="2017">2017</option>

                            <option value="2016">2016</option>

                            <option value="2015">2015</option>

                            <option value="2014">2014</option>

                            <option value="2013">2013</option>

                            <option value="2012">2012</option>

                            <option value="2011">2011</option>

                            <option value="2010">2010</option>

                            <option value="2009">2009</option>

                            <option value="2008">2008</option>

                            <option value="2007">2007</option>

                            <option value="2006">2006</option>

                            <option value="2005">2005</option>

                            <option value="2004">2004</option>

                            <option value="2003">2003</option>

                            <option value="2002">2002</option>

                            <option value="2001">2001</option>

                            <option value="2000">2000</option>

                            <option value="1999">1999</option>

                            <option value="1998">1998</option>

                            <option value="1997">1997</option>

                            <option value="1996">1996</option>

                            <option value="1995">1995</option>

                            <option value="1994">1994</option>

                            <option value="1993">1993</option>

                            <option value="1992">1992</option>

                            <option value="1991">1991</option>

                            <option value="1990">1990</option>

                            <option value="1989">1989</option>

                            <option value="1988">1988</option>

                            <option value="1987">1987</option>

                            <option value="1986">1986</option>

                            <option value="1985">1985</option>

                            <option value="1984">1984</option>

                            <option value="1983">1983</option>

                            <option value="1982">1982</option>

                            <option value="1981">1981</option>

                            <option value="1980">1980</option>

                            <option value="1979">1979</option>

                            <option value="1978">1978</option>

                            <option value="1977">1977</option>

                            <option value="1976">1976</option>

                            <option value="1975">1975</option>

                            <option value="1974">1974</option>

                            <option value="1973">1973</option>

                            <option value="1972">1972</option>

                            <option value="1971">1971</option>

                            <option value="1970">1970</option>

                            <option value="1969">1969</option>

                            <option value="1968">1968</option>

                            <option value="1967">1967</option>

                            <option value="1966">1966</option>

                            <option value="1965">1965</option>

                            <option value="1964">1964</option>

                            <option value="1963">1963</option>

                            <option value="1962">1962</option>

                            <option value="1961">1961</option>

                            <option value="1960">1960</option>

                            <option value="1959">1959</option>

                            <option value="1958">1958</option>

                            <option value="1957">1957</option>

                            <option value="1956">1956</option>

                            <option value="1955">1955</option>

                            <option value="1954">1954</option>

                            <option value="1953">1953</option>

                            <option value="1952">1952</option>

                            <option value="1951">1951</option>

                            <option value="1950">1950</option>

                            <option value="1949">1949</option>

                            <option value="1948">1948</option>

                            <option value="1947">1947</option>

                            <option value="1946">1946</option>

                            <option value="1945">1945</option>

                            <option value="1944">1944</option>

                            <option value="1943">1943</option>

                            <option value="1942">1942</option>

                            <option value="1941">1941</option>

                            <option value="1940">1940</option>

                            <option value="1939">1939</option>

                            <option value="1938">1938</option>

                            <option value="1937">1937</option>

                        </select>
                        <input id="terDate" name="terDate" type="hidden" value="1900-01-01"><br>
                        <span class="textfieldRequiredMsg">Required</span>
                        <span class="textfieldInvalidFormatMsg">Invalid Date</span>
                        <input id="mar_totalRecords" name="mar_totalRecords" value="0" type="hidden" readonly="readonly">
                    </li>
                    <li class="imbraText">
                        How terminated
                        <select id="terminatedReason" name="terminatedReason" class="combo">
                            <option value="0" selected="">Please Select...</option>
                            <option value="30">Divorced</option>
                            <option value="31">Widowed</option>
                        </select>
                    </li>
                    <li class="imbraText">
                        <input id="terReason" name="terReason" type="hidden" value="0"><br>
                        <span class="textfieldRequiredMsg">Required</span>
                    </li>
                    <div class="clear"></div>

                </span>
                <li class="imbraText">
                    <span class="imbraText left" style="display:block; margin-right: 30px;">Have you previously sponsored an alien to whom you were engaged or married?</span>
                    <span class="labelyesno"><input type="radio" id="alienSponsoredYes" name="alienSponsored" value="1"> <label for="alienSponsoredYes">Yes</label></span>
                    <input type="radio" id="alienSponsoredNo" name="alienSponsored" value="2" checked="checked"> <label for="alienSponsoredNo">No</label>

                </li>
                <li class="imbraText">If you have children under the age of 18, please provide their ages below (leave blank if you have no children).</li>
                <li class="imbraText" style="padding:0 25px">
                    <table id="childrenAge" style="display:none" class="childrenAge">
                        <tbody><tr id="childrenAgeInfoHeader">
                                <th>Age</th>
                                <th></th>
                            </tr>


                        </tbody></table>
                </li>
                <li class="clearfix agetext">
                    <div id="addAgeText" class="left">Add age:</div>
                    <div style="width:22%; padding-top:5px;" class="left">
                        <select id="childAge" name="childAge" class="combo">
                            <option value="" selected="">Please Select...</option>

                            <option value="49">17</option>

                            <option value="48">16</option>

                            <option value="47">15</option>

                            <option value="46">14</option>

                            <option value="45">13</option>

                            <option value="44">12</option>

                            <option value="43">11</option>

                            <option value="42">10</option>

                            <option value="41">9</option>

                            <option value="40">8</option>

                            <option value="39">7</option>

                            <option value="38">6</option>

                            <option value="37">5</option>

                            <option value="36">4</option>

                            <option value="35">3</option>

                            <option value="34">2</option>

                            <option value="33">1</option>

                            <option value="32">&lt;1</option>
                        </select>
                        <input id="childAge_totalRecords" name="childAge_totalRecords" value="0" type="hidden" readonly="readonly">
                    </div>
                </li>
            </ul>
            <ul class='martial-status'>
                <li class="sectionHeading clearfix"><h1>Residence History</h1></li>
                <li class="imbraText">Please provide all the countries and states where you have resided since the age of 18.</li>
                <li class="imbraText" style="padding:0 0 10px 25px">

                    <table id="residenceInfo" class="residenceInfo formContainer">
                        <tbody><tr id="residenceInfoHeader">
                                <th>Country</th>
                                <th>State/Province</th>
                            </tr>

                            <tr id="residenceRow_1">
                                <td style="border:0">
                                    <input type="hidden" id="r_country_1" name="countryLive_1" value="223" readonly="readonly">
                                    <p>USA</p>
                                </td>
                                <td style="border:0">
                                    <input type="hidden" id="r_state_1" name="stateLive_1" value="4644" readonly="readonly">
                                    <p>California</p>
                                </td>
                            </tr>

                        </tbody></table>
                </li>

                <li style="border:0">Add another: </li>
                <li class="clearfix" style="border:0">
                    <div id="countryLive" style="border:0;padding-right:5px" class="form-group left">
                        <select name="countryLive" id="r_countryimbra" class="form-control">
                            <option value="">Please Select...</option>
                            <option value="4">Afghanistan</option>
                        </select>
                    </div>
                        <div id="stateLive" style="border:0;padding-left:0" class="form-group left">
					
                        <select name="stateLive" id="r_stateimbra" class="form-control">
                            <option value="">Please Select...</option>
                                
                                <option value="3627">Alabama</option>
                        </select>
                    </div>
                </li>
                <input id="residence_totalRecords" name="residence_totalRecords" value="1" type="hidden" readonly="readonly">
            </ul>
            <ul class='martial-status'>
                <li class="imbraText" style="line-height:1.6em;border-top:1px solid #ddd; padding: 7px 30px;">I understand that the above information (except for name and DOB) will be accessible to every foreign national whom I communicate with or who attempts to communicate with me. I understand that if I file a petition for a K non-immigrant visa, then as part of the visa application process, I will be subject to a criminal background check by the US government. I understand that a search of the National Sex Offenders Public Register (NSOPR) will be carried out as part of the background information compilation process. I understand that the results of the NSOPR search will be accessible to every foreign national whom I communicate with or who attempts to communicate with me. I certify that the above information is truthful and accurate and I give my permission for the above information to be released to every foreign national whom I communicate with or who attempts to communicate with me. I hereby waive any rights or obligations that I may have regarding Privacy Regulations and I agree to hold harmless and discharge Cupid Media Pty Ltd from any and all liabilities arising from the use and release of the above information.  </li>
                <li id="agree" class="text-center">
                    <input type="checkbox" id="agreement" name="agree" value="true" class="mr-r-10"><label for="agreement">I Agree</label>
                    <span class="checkboxRequiredMsg"></span>
                </li>
                <li id="error_zone" style="list-style-type: none; display: none;">
                    <span class="errorMessageValidation">Oops: You forgot to answer all the questions. Please scroll up to complete any unanswered questions.</span>
                </li>
                
            </ul>

            <div class="button-inner text-center">
                                    <button class="btn btn-primary btn-green" type="submit">SUBMIT</button>
                                </div>



        </div>
    </div>
        </div>          
    </div>
</div>
<!-- jQuery -->
@endsection
