#include <HX711.h>
#include <LiquidCrystal.h>


#define calibration_factor -7050.0 //This value is obtained using the SparkFun_HX711_Calibration sketch

#define DOUT  3
#define CLK  2
String data = "Hello From Arduino!";

HX711 scale;
const int rs = 12, en = 11, d4 = 4, d5 = 5, d6 = 6, d7 = 7;
LiquidCrystal lcd(rs, en, d4, d5, d6, d7);
void setup() {
  lcd.begin(16, 2);
  Serial.begin(9600);
 Serial.println("HX711 scale demo");

  scale.begin(DOUT, CLK);
  scale.set_scale(calibration_factor); //This value is obtained by using the SparkFun_HX711_Calibration sketch
  scale.tare(); //Assuming there is no weight on the scale at start up, reset the scale to 0

  Serial.println("\nReadings:");
}

void loop() {
  lcd.setCursor(0, 1);
  float x = abs((scale.get_units()) * -1);
  delay(500);
  Serial.print("\nReading: ");
  Serial.print(x, 1); //scale.get_units() returns a float
  Serial.print(" lbs"); //You can change this to kg but you'll need to refactor the calibration_factor
  Serial.println();
  lcd.setCursor(1, 1);
  lcd.print(String(x));
  lcd.print(" lbs");
  if (x >= 1.5) {
//    int y = millis();
//    if (y > 2000) {
      Serial.print(" Traffic Jam");
      lcd.clear();

      lcd.print(" Traffic Jam");
      Serial.println(data);//data that is being Sent
//    }
//    else {
//
//      lcd.clear();
//
//      lcd.print(" Advertisement");
//      Serial.print(" Advertisement");
//
//    }
  }
  else {
    lcd.clear();

    lcd.print(" Advertisement");
    Serial.print(" Advertisement");


  }
}
