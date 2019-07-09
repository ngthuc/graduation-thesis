package com.ngthuc.spsimct594.entity;

import javax.persistence.*;
import java.util.HashSet;
import java.util.Set;

@Entity
@Table(name = "account")
public class Account {

	@Id
	@Column(name = "id", unique = true, length = 30, nullable = false)
	private String id;

	@ManyToOne
	@JoinColumn(name = "managedBy", nullable = false)
	private Organisation organisation;

	@Column(name = "fullname")
	private String fullname;

    @Column(name = "email", nullable = false)
    private String email;

	@Column(name = "subEmail")
	private String subEmail;

	@Column(name = "password",length = 60, nullable = false)
	private String password;

	@Column(name = "role", nullable = false)
	private String role;

	@Column(name = "theme")
	private String theme;

	@Column(name = "status", nullable = false)
	private String accountStatus;

    public Account() {}

	public String getId() {
		return id;
	}

	public void setId(String id) {
		this.id = id;
	}

	public Organisation getOrganisation() {
		return organisation;
	}

	public void setOrganisation(Organisation organisation) {
		this.organisation = organisation;
	}

	public String getFullname() {
		return fullname;
	}

	public void setFullname(String fullname) {
		this.fullname = fullname;
	}

	public String getEmail() {
		return email;
	}

	public void setEmail(String email) {
		this.email = email;
	}

	public String getSubEmail() {
		return subEmail;
	}

	public void setSubEmail(String subEmail) {
		this.subEmail = subEmail;
	}

	public String getPassword() {
		return password;
	}

	public void setPassword(String password) {
		this.password = password;
	}

	public String getRole() {
		return role;
	}

	public void setRole(String role) {
		this.role = role;
	}

	public String getTheme() {
		return theme;
	}

	public void setTheme(String theme) {
		this.theme = theme;
	}

	public String getAccountStatus() {
		return accountStatus;
	}

	public void setAccountStatus(String accountStatus) {
		this.accountStatus = accountStatus;
	}
}
