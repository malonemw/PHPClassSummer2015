 <?php
        class Vehicle {
          public function honk() {
            return "HONK HONK!";
          }
        }
        
        class Bicycle extends Vehicle{
            public function honk(){
                return "Beep Beep!";
            }
        }
        
        $bicycle = new Bicycle();
            
        $bicycle->honk();
        
      ?>