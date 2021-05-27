num = 123456789
strNum =  str(num)
sum = 0

for i in range(0,9,1):
    if i<3:
        sum += int(strNum[i])
    if i == 3:
        sum -= int(strNum[i])
      
    if 4<=i & i<= 5:
         sum += int(strNum[i])
         
    if 6<i & i<8:
        sum = sum + int(strNum[6:8]) 
    
    if i==8: 
         sum += int(strNum[i])
         
print(sum)