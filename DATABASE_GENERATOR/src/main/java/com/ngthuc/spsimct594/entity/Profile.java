package com.ngthuc.spsimct594.entity;

import javax.persistence.*;

@Entity
@Table(name = "profile")
public class Profile {

	@Id
	@GeneratedValue(strategy = GenerationType.IDENTITY)
	@Column(name = "id", nullable = false)
	private Long id;

	@OneToOne
	@JoinColumn(name = "profileOf", nullable = false)
	private Account account;

	@Column(name = "keyName", nullable = false)
	private String key;

    @Column(name = "keyValue", nullable = false)
    private String value;

	@ManyToOne
	@JoinColumn(name = "policy", nullable = false)
	private Policy policy;

	@Column(name = "type", length = 20, nullable = false)
	private String type;

	@Column(name = "status", nullable = false)
	private boolean profileStatus;

    public Profile() {}

	public Long getId() {
		return id;
	}

	public void setId(Long id) {
		this.id = id;
	}

	public Account getAccount() {
		return account;
	}

	public void setAccount(Account account) {
		this.account = account;
	}

	public String getKey() {
		return key;
	}

	public void setKey(String key) {
		this.key = key;
	}

	public String getValue() {
		return value;
	}

	public void setValue(String value) {
		this.value = value;
	}

	public Policy getPolicy() {
		return policy;
	}

	public void setPolicy(Policy policy) {
		this.policy = policy;
	}

	public String getType() {
		return type;
	}

	public void setType(String type) {
		this.type = type;
	}

	public boolean isProfileStatus() {
		return profileStatus;
	}

	public void setProfileStatus(boolean profileStatus) {
		this.profileStatus = profileStatus;
	}
}
