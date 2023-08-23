#jm7uz
import subprocess
import random

def random_mac():
    mac_suffix = [random.randint(0x00, 0xff) for _ in range(5)]
    mac_suffix_str = ':'.join(f'{byte:02X}' for byte in mac_suffix)
    return f"02:{mac_suffix_str}"

def main(interface):
    try:
        subprocess.call(["ifconfig", interface, "down"], shell=True)
        
        new_mac = random_mac()
        subprocess.call(["ifconfig", interface, "hw", "ether", new_mac], shell=True)
        
        subprocess.call(["ifconfig", interface, "up"], shell=True)
        
        print(f"MAC address of {interface} changed to {new_mac} :)")
    except subprocess.CalledProcessError as e:
        print(f"WHATTT error )): {e}")
        
if __name__ == "__main__":
    main("eth0")
