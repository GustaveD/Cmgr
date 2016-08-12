var box = [];
var nb_box = 4;
var test = false;

init_bool();

function	init_bool()
{
	for (var i=0;i<nb_box;i++)
		box.push(false);
};

function	ret_img()
{
	for (var i = 0;i<nb_box;i++)
	{
		if (box[i] == true)
			return i;
	}
}

function	set_box(num_box)
{
	for (var i = 0;i<nb_box;i++)
	{
		if (i == num_box)
		box[i] = true;
		else
			box[i] = false;
	}
	go_snap();
	get_img(num_box);
};

function	unset_box()
{
	for (var i = 0;i<nb_box;i++)
			box[i] = false;
};

function	get_img(msq)
{
	msq = msq +1;
	var path = "./img/masque"+ msq + ".png";
	draw(msq);
};

function	draw(msq)
{
	var cv2 = document.getElementById('cv2');
	var c = cv2.getContext('2d');
	var id = "e" + msq;
	c.clearRect(0, 0, cv2.width, cv2.height);
	var img = document.getElementById(id);
	c.drawImage(img, 200, 110, 170, 170);
}

function	go_snap()
{
	document.getElementById("snap").style.display = 'block';
}

