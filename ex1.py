class Ex1:
    ans =[]
    def Sequence(self, s, ans, path = ''):
        
        for i in range(len(s)):
            self.Sequence(s[i+1:],ans + int(s[:i+1]), path + " + " +s[:i+1])
            self.Sequence(s[i+1:],ans - int(s[:i+1]), path + " - " +s[:i+1])

        if len(s) ==0 & ans ==100:
            return self.ans.append(path)

cal = Ex1()
num = 123456789
numStr =  str(num)
cal.Sequence(numStr, 0)
for i in cal.ans:
    print(i)

