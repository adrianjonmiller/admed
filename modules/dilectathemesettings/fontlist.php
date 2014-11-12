<?php
function get_fonts() {
	$fonts = array(
		'standard',
		'Abel',
		'Abril Fatface',
		'Aclonica',
		'Acme',
		'Actor',
		'Adamina',
		'Aguafina Script',
		'Aladin',
		'Aldrich',
		'Alex Brush',
		'Alfa Slab One',
		'Alice',
		'Alike Angular',
		'Alike', 
		'Allan',
		'Allerta Stencil',
		'Allerta',
		'Almendra SC',
		'Almendra',
		'Amaranth',
		'Amatic SC',
		'Andada',
		'Andika',
		'Annie Use Your Telescope',
		'Anonymous Pro',
		'Antic',
		'Anton',
		'Arapey',
		'Arbutus',
		'Architects Daughter',
		'Arial',
		'Arimo',
		'Arizonia',
		'Armata',
		'Artifika',
		'Arvo',
		'Asset',
		'Astloch',
		'Asul',
		'Atomic Age',
		'Aubrey',
		'Bad Script',
		'Balthazar',
		'Bangers',
		'Basic',
		'Baumans',
		'Belgrano',
		'Bentham',
		'Bevan',
		'Bigshot One',
		'Bilbo Swash Caps',
		'Bilbo',
		'Bitter',
		'Black Ops One',
		'Bonbon',
		'Boogaloo',
		'Bowlby One SC',
		'Bowlby One',
		'Brawler',
		'Bree Serif',
		'Bubblegum Sans',
		'Buda',
		'Buenard',
		'Butcherman',
		'Cabin Condensed',
		'Cabin Sketch',
		'Cabin',
		'Caesar Dressing',
		'Cagliostro',
		'Calligraffitti',
		'Cambo',
		'Candal',
		'Cantarell',
		'Cardo',
		'Carme',
		'Carter One',
		'Caudex',
		'Cedarville Cursive',
		'Ceviche One',
		'Changa One',
		'Chango',
		'Cherry Cream Soda',
		'Chewy',
		'Chicle',
		'Chivo',
		'Coda',
		'Comfortaa',
		'Coming Soon',
		'Concert One',
		'Contrail One',
		'Convergence',
		'Cookie',
		'Copse',
		'Corben',
		'Corben',
		'Cousine',
		'Coustard',
		'Covered By Your Grace',
		'Crafty Girls',
		'Creepster',
		'Crete Round',
		'Crimson Text',
		'Crushed',
		'Cuprum',
		'Damion',
		'Dancing Script',
		'Dawning of a New Day',
		'Days One',
		'Delius Swash Caps',
		'Delius Unicase',
		'Delius',
		'Devonshire',
		'Didact Gothic',
		'Dorsa',
		'Dr Sugiyama',
		'Droid Sans Mono',
		'Droid Sans',
		'Droid Serif',
		'Duru Sans',
		'Dynalight',
		'EB Garamond',
		'Eater',
		'Electrolize',
		'Engagement',
		'Enriqueta',
		'Expletus Sans',
		'Fanwood Text',
		'Fascinate Inline',
		'Fascinate',
		'Federant',
		'Federo',
		'Fjord One',
		'Flamenco',
		'Flavors',
		'Fondamento',
		'Fondamento:400,400italic',
		'Fontdiner Swanky',
		'Forum',
		'Francois One',
		'Fresca',
		'Frijole',
		'Fugaz One',
		'Galdeano',
		'Gentium Basic',
		'Gentium Book Basic',
		'Geo',
		'Georgia',
		'Geostar Fill',
		'Geostar',
		'Give You Glory',
		'Gloria Hallelujah',
		'Goblin One',
		'Gochi Hand',
		'Goudy Bookletter 1911',
		'Gravitas One',
		'Gruppo',
		'Habibi',
		'Hammersmith One',
		'Handlee',
		'Herr Von Muellerhoff',
		'Holtwood One SC',
		'Homemade Apple',
		'IM Fell DW Pica SC',
		'IM Fell Double Pica SC',
		'IM Fell Double Pica',
		'IM Fell English SC',
		'IM Fell English',
		'IM Fell French Canon SC',
		'IM Fell French Canon',
		'IM Fell Great Primer SC',
		'IM Fell Great Primer',
		'Iceland',
		'Inconsolata',
		'Inder',
		'Indie Flower',
		'Irish Grover',
		'Irish Growler',
		'Istok Web',
		'Italianno',
		'Jockey One',
		'Josefin Sans',
		'Judson',
		'Julee',
		'Jura',
		'Just Another Hand',
		'Just Me Again Down Here',
		'Kameron',
		'Kelly Slab',
		'Kenia',
		'Knewave',
		'Kranky',
		'Kreon',
		'Kristi',
		'La Belle Aurore',
		'Lancelot',
		'League Script',
		'Leckerli One',
		'Lekton',
		'Lemon',
		'Limelight',
		'Linden Hill',
		'LMRomanCaps10-Regular',
		'Lobster Two',
		'Lobster',		
		'Lora',
		'Love Ya Like A Sister',
		'Loved by the King',
		'Luckiest Guy',
		'Maiden Orange',
		'Mako',
		'Marck Script',
		'Marko One',
		'Marmelad',
		'Marvel',
		'Mate SC',
		'Mate',
		'Maven Pro',
		'Meddon',
		'MedievalSharp',
		'Medula One',
		'Megrim',
		'Merienda One',
		'Merriweather',
		'Metamorphous',
		'Metrophobic',
		'Michroma',
		'Miltonian Tattoo',
		'Miltonian',
		'Miniver',
		'Miss Fajardose',
		'Miss Saint Delafield',
		'Modern Antiqua',
		'ModernNo.20Regular',
		'Molengo',
		'Monofett',
		'Monoton',
		'Monsieur La Doulaise',
		'Montez',
		'Montserrat',
		'Mountains of Christmas',
		'Mr Bedford',
		'Mr Dafoe',
		'Mr De Haviland',
		'Mrs Sheppards',
		'Muli',
		'Neucha',
		'Neuton',
		'News Cycle',
		'Niconne',
		'Nixie One',
		'Nobile',
		'Nokora',
		'Nosifer',
		'Noticia Text',
		'Nova Cut',
		'Nova Flat',
		'Nova Mono',
		'Nova Oval',
		'Nova Round',
		'Nova Script',
		'Nova Slim',
		'Nova Square',
		'Numans',
		'Nunito',
		'Old Standard TT',
		'Orbitron',
		'Original Surfer',
		'Oswald',
		'Impact',
		'Over the Rainbow',
		'Overlock SC',
		'Overlock',
		'Ovo',
		'PT Sans Caption',
		'PT Sans Narrow',
		'PT Sans',
		'PT Serif Caption',
		'PT Serif',
		'Pacifico',
		'Passero One',
		'Passion One',
		'Patrick Hand',
		'Patua One',
		'Paytone One',
		'Permanent Marker',
		'Petrona',
		'Philosopher',
		'Piedra',
		'Pinyon Script',
		'Plaster',
		'Play',
		'Playball',
		'Playfair Display',
		'Podkova',
		'Poller One',
		'Poly',
		'Pompiere',
		'Prata',
		'Prociono',
		'Puritan',
		'Quantico',
		'Quattrocento Sans',
		'Quattrocento',
		'Questrial',
		'Quicksand',
		'Qwigley',
		'Radley',
		'Raleway',
		'Rammetto One',
		'Rancho',
		'Rationale',
		'Redressed',
		'Reenie Beanie',
		'Ribeye Marrow',
		'Ribeye',
		'Righteous',
		'Rochester', 
		'Rock Salt',
		'Rokkitt',
		'Rosario',
		'Ruge Boogie',
		'Ruslan Display',
		'Ruthie',
		'Sail',
		'Salsa',
		'Sancreek',
		'Sansita One',
		'Sarina',
		'Satisfy',
		'Schoolbell',
		'Shadows Into Light',
		'Shanti',
		'Short Stack',
		'Sigmar One',
		'Signika Negative',
		'Signika',
		'Six Caps',
		'Slackey',
		'Smokum',
		'Smythe',
		'Snippet', 
		'Sofia',
		'Sorts Mill Goudy',
		'Special Elite',
		'Spicy Rice',
		'Spinnaker',
		'Spirax',
		'Squada One',
		'Stardos Stencil',
		'Stint Ultra Condensed',
		'Stoke',
		'Sue Ellen Francisco',
		'Sunshiney',
		'Supermercado One',
		'Swanky and Moo Moo',
		'Swis721CnBTBold',
		'Syncopate',
		'Tahoma',
		'Tangerine',
		'Terminal Dosis Light',
		'Terminal Dosis',
		'The Girl Next Door',
		'Tinos',
		'Trade Winds',
		'Trykker',
		'Tulpen One', 
		'Ubuntu Condensed',
		'Ubuntu Mono',
		'Ubuntu',
		'Ultra',
		'Uncial Antiqua',
		'UnifrakturCook',
		'UnifrakturMaguntia',
		'Unkempt',
		'Unlock',
		'Unna',
		'VT323',
		'Varela Round',
		'Varela',
		'Vast Shadow',
		'Vibur',
		'Vidaloka',
		'Viga',
		'Volkhov', 
		'Vollkorn',
		'Voltaire',
		'Waiting for the Sunrise',
		'Wallpoet',
		'Walter Turncoat',
		'Wire One',
		'Yanone Kaffeesatz',
		'Yellowtail',
		'Yeseva One',
		'Yesteryear',
		'Zeyada'		
	);
	return $fonts;
}
?>