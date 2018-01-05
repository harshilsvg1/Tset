<?php
   class Users 
   {
      /* variables */
      var $UserName;
      var $FirstName;
	  var $LastName;
	  var $Email;
      
      /* functions */
      function setUserName($parameter)
	  {
         $this->UserName = $parameter;
      }

      function setFirstName($parameter)
	  {
		$this->FirstName = $parameter;
      }

	  function setLastName($parameter)
	  {
         $this->LastName = $parameter;
      }
    	  
	  function setEmail($parameter)
	  {
         $this->Email = $parameter;
      }
	  
	   function getUserName()
	  {
         echo "UserName:- ".$this->UserName ."<br/>";
      }
	  
	  function getFirstName()
	  {
         echo "FirstName:- ".$this->FirstName ." <br/>";
	
      }

	  function getLastName()
	  {
         echo "LastName:- ".$this->LastName ." <br/>";
	  }
	  
      function getEmail()
	  {
         echo "Email:- ".$this->Email ." <br/>";
	  }
	  
   }
   
   abstract class AccountAbstract
   {
	  abstract function setUser($user);
   }
   
     class Accounts extends AccountAbstract
   {
      /* variables */
      var $AccountNumber;
      var $Balance=0;
	  var $BankName;
	  var $Deposit=0;
	  var $WithDraw=0;
	  var $AccountType;
	  var $TransferAmount=0;
	  var $flag=0;
	  var $flag1=0;
	  var $user;
	  var $user1;
	  var $user2;
	  
	  
	  
	  function __construct($user1,$user2,$user3)
	  {
		  $this->setUser($user1);
	  }
	  
	  public function setUser($user)
	  {
				$this->user =  $user;
	  }
	  
      
      /* functions */
      function setAccountNumber($parameter)
	  {
         $this->AccountNumber = $parameter;
      }
      
      
      function setBalance($parameter)
	  {
		$this->Balance = $parameter;
      }
   
	  function setBankName($parameter)
	  {
         $this->BankName = $parameter;
      }
      
	  function setAccountType($parameter)
	  {
         $this->AccountType = $parameter;
      }
	  
      function getAccountNumber()
	  {
         echo "AccountNumber:- ".$this->AccountNumber ."<br/>";
      }
	  
	  function getBalance()
	  {
         echo "Balance:- ".$this->Balance." <br/>";
	
      }
	  
	  function getBankName()
	  {
         echo "*****************************".$this->BankName ."**************************************"." <br/>";
	  }
	  
	  
	  
	  function getAccountType()
	  {
         echo "AccountType:- ".$this->AccountType." <br/>";
      }
	  
	  function setDeposit($parameter)
	  {
        if($this->AccountType=="Saving")
		{
		if($parameter<=49000)
		{
			$this->Deposite = $parameter;
			$this->Balance = $this->Deposite+$this->Balance;
		}
		else
		{
			$this->flag=1;
		}
		}
		else
		{
			$this->Deposite = $parameter;
			$this->Balance = $this->Deposite+$this->Balance;
		}
      }
	  
	  function getDeposit()
	  { 
		 if($this->flag==0)
		 {
         echo "Deposite:-  ".$this->Deposite ." <br/>";
		 echo "Last Update Balance:-".$this->Balance."<br/>";
		 }
		 else
		 {
			 echo "more Then 49000 Deposite Is Not is Not Accepted <br/>";
		 }
	  }
	  
	  function setWithDraw($parameter)
	  {
        if($this->AccountType=="Saving")
		 {
			 if($parameter<=10000)
			 {
				$this->WithDraw = $parameter;
				$this->Balance = $this->Balance-$this->WithDraw;
			 }
			 else
			 {
				 $this->flag1=1;
			 }
			 
		 }
		 else
		 {
			$this->WithDraw = $parameter;
			$this->Balance = $this->Balance-$this->WithDraw;
		 }
      }

	  function getWithDraw()
	  {if($this->flag1==0)
		 {
         echo "WithDraw-  ".$this->WithDraw ." <br/>";
		 echo "Last Update Balance".$this->Balance ."<br/>";
		 }
		 else
		 {
			 echo "You Can Not WithDraw More Then 10000 in saving account<br/>";
		 }
	  }
	  
	  
	  /* For Transfer Amount To Same Bank Account*/
	  function TransferInToSameBank($FirstName,$LastName,$AccountNumber,$Balance,$TransferAmount)
	  {
		  echo "<br/>";
		   echo "********" .$this->BankName . "**********" .$this->BankName ."**************<br/><br/>";
		   echo $user->FirstName . $this->LastName . "To" . $FirstName.$LastName."<br/>" ;
		   echo $this->AccountNumber ."To". $AccountNumber ."<br/>";
		   echo "Transfer Amount" .$TransferAmount."<br/>";
		   $this->Balance=$this->Balance-$TransferAmount;
		   echo "".$this->FirstName.$this->LastName ."--"."Account Number  .".$this->AccountNumber."  Debited  ".$TransferAmount."  Last Update Balance  ".$this->Balance ."<br/>";
		   $Balance=$Balance+$TransferAmount;
		   echo $FirstName.$LastName."--".$AccountNumber."  Credited  ".$TransferAmount."  Last Update Balance  ".$Balance."<br/>";
		   
	  }
	  /* For Transfer Amount To Same Bank Account*/
	  function TransferInToDifferentBank($FirstName,$LastName,$AccountNumber,$Balance,$BankName,$TransferAmount)
	   {
		   echo "<br/>";
		   echo "********" .$this->BankName . "**********" .$BankName ."**************<br/><br/>";
		   echo $this->FirstName . $this->LastName . "To" . $FirstName.$LastName."<br/>" ;
		   echo $this->AccountNumber ."TO".$AccountNumber."<br/>";
		   echo "IFSC Code :- BOBS708596<br/>";
		   echo "Transfer Amount".$TransferAmount."<br/>";		   
		   $this->Balance=$this->Balance-$TransferAmount;
		   echo "".$this->FirstName.$this->LastName ."--"."Account Number.".$this->AccountNumber."  Debited  ".$TransferAmount."  Last Update Balance  ".$this->Balance ."<br/>";
		   $Balance=$Balance+$TransferAmount;
		   echo $FirstName.$LastName."--".$AccountNumber."Credited".$TransferAmount."Last Update Balance".$Balance."<br/>";
	   }
   }
    
$User1 = new Users; 
$User2 = new Users; 
$User3 = new Users; 

 
$Account1 = new Accounts;
$Account2 = new Accounts;
$Account3 = new Accounts;

$Account1->setBankName("Bank Of India");
$Account1->getBankName();
$User1->setUserName("Amitmht");
$User1->setFirstName("Amit");
$User1->setLastName("Mehta");
$User1->setEmail("amitmehta@gmail.com");
$User1->getUserName();
$User1->getFirstName();
$User1->getLastName();
$User1->getEmail();
$Account1->setAccountNumber("342454586797");
$Account1->getAccountNumber();
$Account1->setAccountType("Saving");
$Account1->getAccountType();
$Account1->setBalance("20000");
$Account1->setDeposit("500");
$Account1->getDeposit();
$Account1->setWithDraw("500");
$Account1->getWithDraw();
$Account1->getBalance();

$Account2->setBankName("Bank Of India");
$Account2->getBankName();
$User2->setUserName("Ankitrnp");
$User2->setFirstName("Ankit");
$User2->setLastName("Ranpariya");
$User2->setEmail("ankitrnp@gmail.com");
$User2->getUserName();
$User2->getFirstName();
$User2->getLastName();
$User2->getEmail();
$Account2->setAccountNumber("122536958478");
$Account2->getAccountNumber();
$Account2->setAccountType("Saving");
$Account2->getAccountType();
$Account2->setBalance("20000");
$Account2->setDeposit("500");
$Account2->getDeposit();
$Account2->setWithDraw("500");
$Account2->getWithDraw();
$Account2->getBalance();

$Account3->setBankName("BOB");
$Account3->getBankName();
$User3->setUserName("Akshay");
$User3->setFirstName("Ankit");
$User3->setLastName("Vadaliya");
$User3->setEmail("akshayvdl@gmail.com");
$User3->getUserName();
$User3->getFirstName();
$User3->getLastName();
$User3->getEmail();
$Account3->setAccountNumber("789546263584");
$Account3->getAccountNumber();
$Account3->setAccountType("Saving");
$Account3->getAccountType();
$Account3->setBalance("20000");
$Account3->setDeposit("500");
$Account3->getDeposit();
$Account3->setWithDraw("500");
$Account3->getWithDraw();
$Account3->getBalance();

$Account1->TransferInToSameBank($User2->FirstName,$User2->LastName,$Account2->AccountNumber,$Account2->Balance,10000);
$Account1->TransferInToDifferentBank($User3->FirstName,$User3->LastName,$Account3->AccountNumber,$Account3->Balance,$Account3->BankName,1000);

?>