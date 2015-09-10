// define PIN with temperature sensor
int tempsens = A0;

// Create a variable that will store the temperature value & voltage
double temperature = 0;
double voltage = 0; 



void setup()
{
  // Register a Spark variable here
  Spark.variable("temperature", &temperature, DOUBLE);

  // Connect the temperature sensor to A0 and configure it
  // to be an input
  pinMode(tempsens, INPUT);
}

void loop()
{
  // Keep reading the temperature so when we make an API
  // call to read its value, we have the latest one
  voltage = (analogRead(tempsens) * 3.3)/4095;
  temperature = (voltage - 0.5) * 100;
 
}