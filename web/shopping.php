<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>CS 313 Projects</title>
        <meta charset="utf-8">
        
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" />
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
        
        <link href="css/bootstrap.css" rel="stylesheet"/>
        <link href="css/mdb.css" rel="stylesheet"/>
        <link href="css/main.css" rel="stylesheet"/>
    </head>
<body>    
    <?php include 'navbar.php';?>
    
    <header class="edge-header grey lighten-2">
    </header>
    <div class="container free-bird">
        <div class="col-md-12 col-lg-12 mx-auto float-none white z-depth-1 p-3">
            <h2>Character Figurines</h2>
            <ul class="list-unstyled card p-3">
                <li class="media">
                    <img class="d-flex mr-3 hoverable" src="img/so3-fayt-leingod.jpg" alt="Cliff Fittir">
                    <div class="media-body">
                        <ul>
                            <li><h5>Fayt Leingod</h5></li>
                            <li>The main character of Star Ocean: Till the End of Time. He is a seemingly normal 19-year-old college student from Earth who doesn't pay too much attention to his studies, and takes every opportunity to engage in combat simulation holographic games. He uses a sword in combat, with some skill in Symbology.</li>
                            <li><br></li>
                            <li class="d-flex flex-row-reverse"><h5 class="px-2"><strong>$<span>12.00</span></strong></h5></li>
                            <li></li>
                            <li>
                                <div class="d-flex flex-row-reverse btn-group">
                                    <button class="btn btn-lg blue" onclick="addCart('Fayt Leingod', 12.00, 'img/so3-fayt-leingod.jpg', 1);" type="button">Add to Cart</button>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
            <ul class="list-unstyled card p-3">
                <li class="media">
                    <div class="media-body">
                        <ul>
                            <li><h5>Cliff Fittir</h5></li>
                            <li>A 36-year-old Klausian born on the planet Klaus III. He is a member of the anti-Federation organization Quark, which is labeled a terrorist group by the Federation government. Cliff possesses much greater strength than other humanoids due to the high-gravity environment of his planet. He prefers to use his fists in combat, augmenting his punching power with gauntlets.</li>
                            <li><br></li>
                            <li class="d-flex flex-row"><h5 class="px-2"><strong>$12.00</strong></h5></li>
                            <li></li>
                            <li>
                                <div class="d-flex flex-row btn-group">
                                    <button class="btn btn-lg blue" type="button">Add to Cart</button>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="media-right">
                        <img class="d-flex mr-3 hoverable" src="img/so3-cliff-fittir.jpg" alt="Cliff Fittir">
                    </div>
                </li>
            </ul>
            <ul class="list-unstyled card p-3">
                <li class="media">
                    <img class="d-flex mr-3 hoverable" src="img/so3-sophia-esteed.jpg" alt="Cliff Fittir">
                    <div class="media-body">
                        <ul>
                            <li><h5>Sophia Esteed</h5></li>
                            <li>Fayt's 17-year-old childhood friend who accompanies him to Hyda IV. She was born on the orbital colony Moonbase and moved to Earth later. Unusually for girls of her time, she has traditionally feminine interests, like cooking and sewing. She uses a staff to cast Symbology in combat, and is a weak physical fighter.</li>
                            <li><br></li>
                            <li class="d-flex flex-row-reverse"><h5 class="px-2 animate rollIn"><strong>$12.00</strong></h5></li>
                            <li></li>
                            <li>
                                <div class="d-flex flex-row-reverse btn-group">
                                    <button class="btn btn-lg blue" type="button">Add to Cart</button>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
            <ul class="list-unstyled card p-3">
                <li class="media">
                    <div class="media-body">
                        <ul>
                            <li><h5>Peppita Rossetti</h5></li>
                            <li>A energetic and flamboyant 14-year-old Velbaysian from a circus group known as the Rosseti Troupe. She makes her debut as a dancer, and hopes to become the star attraction. She is taken care of by the circus ringmaster, and awaits for her father, who is a soldier within the Federation. Her fighting style is acrobatic, and she uses shoes and bangles as weapons.</li>
                            <li><br></li>
                            <li class="d-flex flex-row"><h5 class="px-2"><strong>$12.00</strong></h5></li>
                            <li></li>
                            <li>
                                <div class="d-flex flex-row btn-group">
                                    <button class="btn btn-lg blue" type="button">Add to Cart</button>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="media-right">
                        <img class="d-flex mr-3 hoverable" src="img/so3-peppita-rossetti.jpg" alt="Cliff Fittir">
                    </div>
                </li>
            </ul>
            <ul class="list-unstyled card p-3">
                <li class="media">
                    <img class="d-flex mr-3 hoverable" src="img/so3-nel-zelpher.jpg" alt="Cliff Fittir">
                    <div class="media-body">
                        <ul>
                            <li><h5>Nel Zypher</h5></li>
                            <li>A 23-year-old agent of Aquaria from Elicoor II, who specializes in infiltration and intelligence gathering. She serves as a guide for Fayt while on her planet, and is a user of "Runology," something that is suspiciously similar to Symbology. She is a fast and agile character, who attacks with blades.</li>
                            <li><br></li>
                            <li class="d-flex flex-row-reverse"><h5 class="px-2"><strong>$12.00</strong></h5></li>
                            <li></li>
                            <li>
                                <div class="d-flex flex-row-reverse btn-group">
                                    <button class="btn btn-lg blue" type="button">Add to Cart</button>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
            <ul class="list-unstyled card p-3">
                <li class="media">
                    <div class="media-body">
                        <ul>
                            <li><h5>Albel Nox</h5></li>
                            <li>A 24-year-old commander of the Black Brigade, one of the three military divisions of the Kingdom of Airyglyph from Elicoor II, and is known as "Albel the Wicked". He is bitter and malicious, though possesses intense self-loathing due to the blame he feels for the death of his father. He uses a katana in combat, as well as the claw-like gauntlet on his left arm.</li>
                            <li><br></li>
                            <li class="d-flex flex-row"><h5 class="px-2"><strong>$12.00</strong></h5></li>
                            <li></li>
                            <li>
                                <div class="d-flex flex-row btn-group">
                                    <button class="btn btn-lg blue" type="button">Add to Cart</button>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="media-right">
                        <img class="d-flex mr-3 hoverable" src="img/so3-albel-nox.jpg" alt="Cliff Fittir">
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <aside>
            <div class="shopping-cart">
                <button type="button" class="btn btn-lg blue"><i class="fa fa-cart-plus fa-3x"></i></button>
                <span id="counter" class="counter hidden">0</span>
            </div>
    </aside>
</body>
    <footer class="page-footer blue">
        <?php include 'footer.php';?>
    </footer>
    
    <script src="js/jquery-3.1.1.js"></script>
	<script src="js/tether.js"></script>
    <script src="js/bootstrap.js"></script>
	<script src="js/mdb.js"></script>
    
    <script src="js/main.js"></script>
    
</html>