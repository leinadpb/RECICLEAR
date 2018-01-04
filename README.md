# RECICLEAR - Requeriments

## Container model:

### Parameters
* localization
* image
* status (Full or Empty)
* id (container name)

### Methods
* Empty container (EmptyContainer): The administrator/system will request to empty the container. This will produce a request to the Garbage Collection Department. It will be sent by email for simplicity reasons.
* Block container (BlockContainer): The system will be able to block the container when it is full. The Geombo Garbage Sensor Pro's sensor send fill information to the system. The system will compare it with the capacity limit of the container (80kg), if it reaches it, this function is called and the container is blocked.
* Unlock container (UnlockContainer): The system will be able to unlock the container when the information of fill received by the sensor is lower than the limit stablished.
* Verify garbage (VerifyGarbage): The system will verify the type of garbage. The system will count on with a "Sensor Specifics", that can be used in arduino platforms. With this sensor we can obtain the density of the garbage being processed, if it is the density of any type of plastic then it can get into the container. If it doesn't, the system will throw it to the right side where there will be a container open for garbage not accepted.
* Get Pounds (GetPounds): This will return the pounds stored (at the moment) in the container.

## Dashboard:
* Show total amount of money accumulated in lbs.
* Show total amount of pounds (lbs) stored: this will be all garbage that have been collected. From here, the system will allow the administrator to generate a cotization based on the pounds required by the client. This is sent to the client (by email por simplicity reasons) then when the Sales Departement receives the payment this pounds will be automatically discount to te total amount of pounds stored. As this is a prototipe, in the cotization page there will be two buttons: one to accept the payment and other to decline it.
* Show total amount of pounds in all containers.
* Show container information:
* - Localization
* - Status (If it is Full or Empty).
* - Capacity in pounds.
* - Filling status (this can be obtained with the GetPounds's container method).
* For every container:
* - Add button action to "Force Request Empty Container": The Garbage Collection Department's personal will be able to send a high privilege notification (email for simplicity reasons) in case that this department takes to long to Collect the garbage.

