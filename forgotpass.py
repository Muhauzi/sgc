import bcrypt

def check_password(password, hashed_password):
    return bcrypt.checkpw(password.encode('utf-8'), hashed_password.encode('utf-8'))

# Example usage
password = "muhamadfauzi"
hashed_password = "$2y$12$OxX14Dp6xy3r6UAwu9W08e0UC4PG.51MfWYEZ3c9tUS89Veobcf32"
is_match = check_password(password, hashed_password)

if is_match:
    print("Password matches!")
else:
    print("Password does not match.")
