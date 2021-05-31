def tim_buoc(x,y):
    buoc = 0
    dau = ''
    while(True):
        if x>y:
            x -=1
            dau += ' - ' 
        elif x*2<=y:
            x=x*2
            dau += ' * '
        elif x*2>y & y%2==1:
            x = x*2
            dau += ' * '
        elif x*2>y & y%2==0:
            x = x-1
            dau += ' - '
        
        buoc +=1
        if x=y:
            return buoc 
        print(dau)
    
    buoc =  tim_buoc(x,y)
    print( buoc )