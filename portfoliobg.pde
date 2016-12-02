float angle = 0;

float angleSpeed = 0.01;
void setup()
{

  size(1200, 800, P3D);

//noStroke();
fill(32,29,27);

}

void draw()
{

  stroke(0);


   translate(width / 2, height / 2);

fill(25,25,25);



  rotateY(map(mouseX, 0, width, 0, PI));
  rotateX(map(mouseY, 0, height, 0, PI));


   rotateY(angle);
    rotateX(angle/2);
  rotateZ(angle/3);

 sphere(800);
fill(32,29,27);
  rotateY(map(mouseY, 0, width, 0, PI));
  rotateX(map(mouseX, 0, height, 0, PI));
 sphere(300);

angle += angleSpeed;

}